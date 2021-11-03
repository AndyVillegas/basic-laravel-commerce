<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\Category;
use App\Models\User;

class CategoryViewTest extends TestCase
{
    use RefreshDatabase;

    public function test_index()
    {
        $categories = Category::factory(15)->create();
        $user = User::factory()->create();
        $viewString = $this->actingAs($user)->view('category.index', compact('categories'));
        $viewTableString = $this->blade('<x-category.table :categories="$categories" />',compact('categories'));
        // Debe de renderizar el componente de tabla de categorías
        $this->assertTrue(str_contains($viewString, $viewTableString));
    }

    public function test_create()
    {
        $categories = Category::factory(15)->create();
        $user = User::factory()->create();
        $viewString = $this->actingAs($user)->view('category.create');
        $viewFormString = $this->blade('<x-category.form />');
        // Debe de renderizar el componente de formulario de categorías
        $this->assertTrue(str_contains($viewString, $viewFormString));
    }
}
