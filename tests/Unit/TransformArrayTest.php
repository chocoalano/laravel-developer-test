<?php

namespace Tests\Unit;

use App\Services\TransformArray;
use PHPUnit\Framework\TestCase;

class TransformArrayTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example_1()
    {
        $array = [
            ['key' => 'name', 'value' => 'Edwin'],
            ['key' => 'address', 'value' => 'jln ABC'],
            ['key' => 'phone', 'value' => '30259732059'],
            ['key' => 'email', 'value' => 'a@a.com'],
            ['key' => 'city', 'value' => 'Jakarta'],
        ];

        $this->assertEquals(
            [
                'name' => 'Edwin',
                'address' => 'jln ABC',
                'phone' => '30259732059',
                'email' => 'a@a.com',
                'city' => 'Jakarta',
            ],
            TransformArray::transformer($array)
        );
    }

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example_2()
    {
        $array = [
            ['key' => 'name', 'value' => 'John Doe'],
            ['key' => 'address', 'value' => 'this is address'],
            ['key' => 'phone', 'value' => '+62812345678'],
            ['key' => 'email', 'value' => 'john.doe@example.com'],
            ['key' => 'city', 'value' => 'this is city'],
        ];

        $this->assertEquals(
            [
                'name' => 'John Doe',
                'address' => 'this is address',
                'phone' => '+62812345678',
                'email' => 'john.doe@example.com',
                'city' => 'this is city',
            ],
            TransformArray::transformer($array)
        );
    }
}
