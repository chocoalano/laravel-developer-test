<?php

namespace Tests\Unit;

use App\Services\GroupArray;
use PHPUnit\Framework\TestCase;

class GroupArrayTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example_1()
    {
        $categories = [
            ['id' => 1, 'name' => 'Backend Developer'],
            ['id' => 2, 'name' => 'Frontend Developer'],
            ['id' => 3, 'name' => 'Full Stack Developer'],
            ['id' => 4, 'name' => 'Android Developer'],
        ];

        $values = [
            ['id' => 1, 'name' => 'Hasan Batari', 'category_id' => 3],
            ['id' => 2, 'name' => 'Setiawan Nur', 'category_id' => 2],
            ['id' => 3, 'title' => 'Lutfi Firdaus', 'category_id' => 1],
            ['id' => 4, 'title' => 'Annisa Melati', 'category_id' => 1],
            ['id' => 5, 'title' => 'Lestari Imran', 'category_id' => 2],
            ['id' => 5, 'title' => 'Abdullah Faisal', 'category_id' => 3],
        ];

        $this->assertEquals(
            [
                'Backend Developer' => [
                    ['id' => 3, 'title' => 'Lutfi Firdaus', 'category_id' => 1],
                    ['id' => 4, 'title' => 'Annisa Melati', 'category_id' => 1],
                ],
                'Frontend Developer' => [
                    ['id' => 2, 'name' => 'Setiawan Nur', 'category_id' => 2],
                    ['id' => 5, 'title' => 'Lestari Imran', 'category_id' => 2],
                ],
                'Full Stack Developer' => [
                    ['id' => 1, 'name' => 'Hasan Batari', 'category_id' => 3],
                    ['id' => 5, 'title' => 'Abdullah Faisal', 'category_id' => 3],
                ],
                'Android Developer' => []
            ],
            GroupArray::transformer($categories, $values)
        );
    }

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example_2()
    {
        $categories = [
            ['id' => 1, 'name' => 'Sport'],
            ['id' => 2, 'name' => 'Food']
        ];

        $values = [
            ['id' => 1, 'title' => 'UEFA League Champion', 'category_id' => 1],
            ['id' => 2, 'title' => 'Juara Piala Sudirman', 'category_id' => 1],
            ['id' => 3, 'title' => '10 Restoran enak', 'category_id' => 2],
            ['id' => 4, 'title' => 'Final F1', 'category_id' => 1],
            ['id' => 5, 'title' => 'Cara memasak Kue', 'category_id' => 2],
        ];

        $this->assertEquals(
            [
                'Sport' => [
                    ['id' => 1, 'title' => 'UEFA League Champion', 'category_id' => 1],
                    ['id' => 2, 'title' => 'Juara Piala Sudirman', 'category_id' => 1],
                    ['id' => 4, 'title' => 'Final F1', 'category_id' => 1],
                ],
                'Food' => [
                    ['id' => 3, 'title' => '10 Restoran enak', 'category_id' => 2],
                    ['id' => 5, 'title' => 'Cara memasak Kue', 'category_id' => 2],
                ],
            ],
            GroupArray::transformer($categories, $values)
        );
    }
}
