<?php

namespace Tests\Feature;

use App\Models\Category;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    /**
     * Setup the test environment.
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $this->artisan('migrate:fresh --seed');
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_index()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_create()
    {
        $response = $this->json('POST', route('category.store'), [
            'name' => 'Test Category 1'
        ]);

        $response->assertStatus(200)
            ->assertJson([
                'data' => [
                    'name' => 'Test Category 1'
                ]
            ]);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_create_fail()
    {
        $response = $this->json('POST', route('category.store'));

        $response->assertStatus(422)
            ->assertJsonStructure([
                'errors',
                'message'
            ]);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_read()
    {
        $category = Category::query()->create([
            'name' => 'Test Read'
        ]);

        $response = $this->json('GET', route('category.show', ['category' => $category->id]));

        $response->assertStatus(200)
            ->assertJson([
                'data' => [
                    'name' => $category->name,
                ]
            ]);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_read_fail()
    {
        $response = $this->json('GET', route('category.show', ['category' => 0]));

        $response->assertStatus(404);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_update()
    {
        $category = Category::query()->create([
            'name' => 'Test Category'
        ]);

        $response = $this->json('PUT', route('category.update', ['category' => $category->id]), [
            'name' => 'Test Update Name'
        ]);

        $response->assertStatus(200)
            ->assertJson([
                'data' => [
                    'name' => 'Test Update Name'
                ]
            ]);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_update_fail()
    {
        $category = Category::query()->create([
            'name' => 'Test Category'
        ]);

        $response = $this->json('PUT', route('category.update', ['category' => $category->id]));

        $response->assertStatus(422)
            ->assertJsonStructure([
                'errors',
                'message'
            ]);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_delete()
    {
        $category = Category::query()->create([
            'name' => 'Test Category'
        ]);

        $response = $this->json('DELETE', route('category.destroy', ['category' => $category->id]));

        $response->assertStatus(200);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_delete_fail()
    {
        $response = $this->json('DELETE', route('category.destroy', ['category' => 0]));

        $response->assertStatus(404);
    }
}
