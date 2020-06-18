<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateCategoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @return void
     * @test
     */
    public function quests_users_can_not_create_categories(): void
    {
        $response = $this->post(route("categories.save"), [
            "name" => "Camisas", "icon" => '<i class="fas fa-car"></i>'
        ]);

        $response->assertStatus(302);
        $response->assertRedirect(route("login"));
    }

    /**
     * @return void
     * @test
     */
    public function common_users_can_not_create_categories(): void
    {
        $user = factory(User::class)->create([
            "role" => 0
        ]);

        $this->actingAs($user);

        $response = $this->post(route("categories.save"), [
            "name" => "Camisas", "icon" => '<i class="fas fa-car"></i>'
        ]);

        $response->assertStatus(302);
        $response->assertRedirect(route("index"));
    }

    /**
     * @return void
     * @test
     */
    public function banned_users_can_not_create_categories(): void
    {
        $user = factory(User::class)->create([
            "status" => 100
        ]);

        $response = $this->post(route("categories.save"), [
            "name" => "Camisas", "icon" => '<i class="fas fa-car"></i>'
        ]);

        $response->assertStatus(302);
        $response->assertRedirect(route("login.index"));
    }

    /**
     * @return User
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

        $response = $this->from(route("categories.index"))->post(route("categories.save"), [
            "name" => "",
            "icon" => ""
        ]);

        $response->assertStatus(302);
        $response->assertRedirect(route("categories.index"));
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

        $response = $this->from(route("categories.index"))->post(route("categories.save"), [
            "name" => "hola hola",
            "icon" => '<i class="fas fa-car"></i>'
        ]);

        $response->assertStatus(302);
        $response->assertRedirect(route("categories.index"));
        $response->assertSessionHasErrors(["name"]);
    }

    /**
     * @return void
     * @test
     * @depends a_authenticated_user_with_role_admin_and_not_banned
     */
    public function an_authenticated_user_and_with_role_admin_can_create_categories(User $user): void
    {
        $this->actingAs($user);

        $response = $this->post(route("categories.save"), [
            "name" => "Camisas",
            "icon" => '<i class="fas fa-car"></i>'
        ]);

        $response->assertStatus(302);
        $response->assertRedirect(route("categories.index"));

        $this->assertDatabaseHas("categories", [
            "name" => "Camisas"
        ]);
    }
}
