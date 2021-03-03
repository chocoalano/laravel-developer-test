<?php

namespace Tests\Unit;

use App\Services\CoinFraction;
use PHPUnit\Framework\TestCase;

class CoinFractionTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example_1()
    {
        $fractions = [100000, 50000, 20000, 10000, 5000, 2000, 1000, 500, 200, 100, 50];

        $this->assertEquals(
            [
                '5000' => 1,
                '20000' => 1,
                '50000' => 1,
            ],
            CoinFraction::transformer($fractions,75000),
        );
    }

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example_2()
    {
        $fractions = [50, 100, 200, 500, 1000, 2000, 5000, 10000, 20000, 50000, 100000];

        $this->assertEquals(
            [
                '5000' => 1,
                '20000' => 1,
                '50000' => 1,
            ],
            CoinFraction::transformer($fractions,75000)
        );
    }

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example_3()
    {
        $fractions = [100000, 50000, 20000, 10000, 5000, 2000, 1000, 500, 200, 100, 50];

        $this->assertEquals(
            [
                '5000' => 1,
                '20000' => 1,
                '50000' => 1,
                'doesnt_have_fractions' => [20]
            ],
            CoinFraction::transformer($fractions, 75020)
        );
    }
}
