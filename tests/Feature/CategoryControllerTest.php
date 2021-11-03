<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;

class CategoryControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_category_index()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get('/category');
        // Verifica que la página se renderice
        $response->assertStatus(200);
    }

    public function test_category_create()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get('/category/create');
        // Verifica que la página se renderice
        $response->assertStatus(200);
    }

    public function test_category_edit()
    {
        $user = User::factory()->create();
        $category = Category::factory(6)->create();
        $product = Product::factory()->create();
        $response = $this->actingAs($user)->get("/category/$product->id/edit");
        // Verifica que la página se renderice
        $response->assertStatus(200);
    }

    public function test_category_store()
    {
        $this->withoutExceptionHandling();
        Storage::fake('public');

        $file = UploadedFile::fake()->image('category.jpg');
        $user = User::factory()->create();
        $response = $this->actingAs($user)
                         ->post('/category', [
                             'name'=> 'Categoría de prueba',
                             'image'=>$file
                         ]);
        // Verificar que se ejecute que la redirección
        $response->assertStatus(302);
        // Verificar que se haya creado el categoría
        $this->assertDatabaseHas('categories', [
            'name' => 'Categoría de prueba',
            'image' => "storage/categories/{$file->hashName()}"
        ]);
        // Verificar que se haya creado la imagen
        Storage::disk('public')->assertExists("categories/{$file->hashName()}");
    }

    public function test_category_update()
    {
        $this->withoutExceptionHandling();
        Storage::fake('public');

        $file = UploadedFile::fake()->image('category.jpg');
        $user = User::factory()->create();
        $category = Category::factory()->create();
        $response = $this->actingAs($user)
                         ->put("/category/$category->id", [
                             'name'=> 'Categoría de prueba Editada',
                             'image'=>$file
                         ]);
        // Verificar la redirección
        $response->assertStatus(302);
        // Verificar la actualización del archivo
        Storage::disk('public')->assertExists("categories/{$file->hashName()}");
        // Verificar que se hayan actualizado los datos
        $this->assertDatabaseHas('categories', [
            'id' => $category->id,
            'name' => 'Categoría de prueba Editada',
            'image' => "storage/categories/{$file->hashName()}",
        ]);
    }

    public function test_category_destroy()
    {
        $this->withoutExceptionHandling();
        Storage::fake('public');
        $file = UploadedFile::fake()->image('category.jpg');
        $user = User::factory()->create();
        $category = Category::factory()->create();
        $response = $this->actingAs($user)
                         ->delete("/category/$category->id");
        // Verificar que se haga la redirección
        $response->assertStatus(302);
        // Verificar que se elimine la foto
        Storage::disk('public')->assertMissing("categories/{$file->hashName()}");
        // Verificar que se elimine de la base de datos
        $this->assertDeleted($category);
    }
}
