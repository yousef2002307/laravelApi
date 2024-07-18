<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Helper\Math\MathHelp;
class MathTest extends TestCase
{
    /**
     * A basic test example.
     */
   public function test_add_can_sum_numbers(): void
    {
        $num1 = 5;
        $num2 = 10;
        $sum = $num1 + $num2;
        $summer = MathHelp::add($num1,$num2);
        $this->assertEquals($sum, $summer,'add is not working properly');
    }
     public function test_add_can_sum_mulitple_numbers(): void
    {
        $num1 = 5;
        $num2 = 10;
        $num3 = 3;
        $sum = $num1 + $num2 + $num3;
        $summer = MathHelp::add($num1,$num2,$num3);
        $this->assertEquals($sum, $summer,'can not take multiple numbers');
    }
     public function test_can_have_only_numeric_arguments(): void
    {
       $this->expectException(\InvalidArgumentException::class);
       $result = MathHelp::add("abc");
       $result = MathHelp::add(["abc"]);
       $result = MathHelp::add(null);
       $result = MathHelp::add(true);
       $result = MathHelp::add(fn()=> true);
    }
     public function test_can_have_only_have_one_argument(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $result = MathHelp::add();
     }
}
