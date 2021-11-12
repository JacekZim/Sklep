<?php
namespace Tests\Feature;

use Tests\TestCase;

class CatTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $res = $this->post('api/category', [
            'name' => 'test',
            'parent' => 1,

        ]);
        $res->assertStatus(200);
    }

    public function test_error()
    {
        $res = $this->post('api/category', [
            'name' => 'test',
            'parent' => 'ghhvg',

        ]);

        $res->assertStatus(422);
        $res->assertJsonStructure(['message', 'errors']);
    }
}
