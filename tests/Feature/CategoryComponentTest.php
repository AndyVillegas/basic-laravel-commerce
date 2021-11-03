<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\Category;

class CategoryComponentTest extends TestCase
{
    use RefreshDatabase;

    public function test_form_category_render_create_mode()
    {
        $view = $this->blade(
            '<x-category.form />'
        );
        // Verificar la url para guardar
        $view->assertSee(route('category.store'));
        // Que se muestre el botón correcto
        $view->assertSee(__('Save'));
    }

    public function test_form_category_render_edit_mode()
    {
        $category = Category::factory()->create();
        $view = $this->blade('<x-category.form :is-edit="true" :category="$category" />',compact('category'));
        // Debe mostrarse la imagen guardada
        $view->assertSee($category->image_url);
        // Debe mostrar la url para editar
        $view->assertSee(route('category.update', $category));
        // Debe mostrar el botón de actualizar
        $view->assertSee(__('Update'));
    }

    public function test_table_category_render()
    {
        $categories = Category::factory(15)->create();
        $view = $this->blade('<x-category.table :categories="$categories" />',compact('categories'));
        $categoriesArray = $categories->toArray();
        // Debe mostrar todas las categorías en orden
        $categoryNames = array_map(function ($category){ return $category['name']; }, $categoriesArray);
        $view->assertSeeInOrder($categoryNames);
        // Debe mostrar las urls para editar
        $categoryUlrsEdit = array_map(function ($category){ return route('category.edit', $category['id']); }, $categoriesArray);
        $view->assertSeeInOrder($categoryUlrsEdit);
        // Debe mostrar lass urls para eliminar
        $categoryUlrsDestroy = array_map(function ($category){ return route('category.destroy', $category['id']); }, $categoriesArray);
        $view->assertSeeInOrder($categoryUlrsDestroy);
    }
}
