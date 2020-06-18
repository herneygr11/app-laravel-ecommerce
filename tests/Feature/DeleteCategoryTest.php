<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DeleteCategoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @return void
     * @test
     */
    public function a_visiting_user_cannot_delete_categories(): void
    {
        $category = factory(Category::class)->create();

        $response = $this->delete(route("categories.delete", $category->id));

        $response->assertStatus(302);
        $response->assertRedirect(route("login"));
    }

    /**
     * @return void
     * @test
     */
    public function common_users_can_not_delete_categories(): void
    {
        $user = factory(User::class)->create([
            "role" => 0
        ]);
        $this->actingAs($user);
        $this->assertAuthenticatedAs($user);

        $category = factory(Category::class)->create();

        $response = $this->delete(route("categories.delete", $category->id));

        $response->assertStatus(302);
        $response->assertRedirect(route("index"));
    }

    /**
     * @return void
     * @test
     */
    public function an_authenticated_user_and_with_role_admin_can_delete_categories(): void
    {
        $user = factory(User::class)->create([
            "role"      => 1,
            "status"    => 0
        ]);
        $this->actingAs($user);
        $this->assertAuthenticatedAs($user);

        $category = factory(Category::class)->create();

        $response = $this->delete(route("categories.delete", $category->id));

        $response->assertStatus(302);
        $response->assertRedirect(route("categories.index"));
        $this->assertSoftDeleted("categories", [
            "id" => $category->id,
            "name" => $category->name,
            "icon" => $category->icon,
        ]);
    }
}
