<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Str;
use Tests\TestCase;

class CreateCategoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @return void
     * @test
     */
    public function an_authenticated_user_can_create_categories()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);

        $this->post(route("categories.save"), [
            "name" => "Camisas", "icon" => '<i class="fas fa-car"></i>'
        ]);

        $this->assertDatabaseHas("categories", [
            "name" => "Camisas", "icon" => e('<i class="fas fa-car"></i>')
        ]);
    }
}
