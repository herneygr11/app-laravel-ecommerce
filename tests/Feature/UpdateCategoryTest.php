<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UpdateCategoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @return void
     * @test
     */
    public function a_visiting_user_cannot_update_categories(): void
    {
        $category = factory(Category::class)->create();

        $response = $this->put(route("categories.update", $category->id), [
            "name" => "Camisas",
            "icon" => '<i class="fas fa-car"></i>'
        ]);

        $response->assertStatus(302);
        $response->assertRedirect(route("login"));
    }

    /**
     * @return void
     * @test
     */
    public function common_users_can_not_update_categories(): void
    {
        $user = factory(User::class)->create([
            "role" => 0
        ]);
        $this->actingAs($user);
        $this->assertAuthenticatedAs($user);

        $category = factory(Category::class)->create();

        $response = $this->put(route("categories.update", $category->id), [
            "name" => "Camisas",
            "icon" => '<i class="fas fa-car"></i>'
        ]);

        $response->assertStatus(302);
        $response->assertRedirect(route("index"));
    }

    /**
     * @return User $user
     * @test
     */
    public function a_authenticated_user_with_role_admin_and_not_banned(): User
    {
        $user = factory(User::class)->create([
            "role"      => 1,
            "status"    => 0
        ]);

        $this->actingAs($user);
        $this->assertAuthenticatedAs($user);

        return $user;
    }

    /**
     * @return void
     * @test
     * @depends a_authenticated_user_with_role_admin_and_not_banned
     */
    public function a_category_required_name_and_icon(User $user): void
    {
        $this->actingAs($user);

        $category = factory(Category::class)->create();

        $response = $this->from(route("categories.edit", $category->slug))->put(route("categories.update", $category->id), [
            "name" => "",
            "icon" => ""
        ]);

        $response->assertStatus(302);
        $response->assertRedirect(route("categories.edit", $category->slug));
        $response->assertSessionHasErrors(["name", "icon"]);
    }

    /**
     * @return void
     * @test
     * @depends a_authenticated_user_with_role_admin_and_not_banned
     */
    public function a_category_required_name_alpha(User $user): void
    {
        $this->actingAs($user);
        $this->assertAuthenticatedAs($user);

        $category = factory(Category::class)->create();

        $response = $this->from(route("categories.edit", $category->slug))->put(route("categories.update", $category->id), [
            "name" => "Short 123",
            "icon" => '<i class="fas fa-car"></i>'
        ]);

        $response->assertStatus(302);
        $response->assertRedirect(route("categories.edit", $category->slug));
        $response->assertSessionHasErrors("name");
    }

    /**
     * @return void
     * @test
     * @depends a_authenticated_user_with_role_admin_and_not_banned
     */
    public function an_authenticated_user_and_with_role_admin_can_update_categories(User $user): void
    {
        $this->actingAs($user);
        $this->assertAuthenticatedAs($user);

        $category = factory(Category::class)->create();

        $response = $this->put(route("categories.update", $category->id), [
            "name" => "Short",
            "icon" => '<i class="fas fa-car"></i>'
        ]);

        $response->assertStatus(302);
        $response->assertRedirect(route("categories.index"));
        $this->assertDataBaseHas("categories", [
            "name" => "Short",
            "icon" => '<i class="fas fa-car"></i>'
        ]);
    }

}
