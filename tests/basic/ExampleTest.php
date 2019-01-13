<?php

use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    public function testTwoPlusTwhEqualsFour()
    {
        $this->assertEquals(4, 2+2);
    }

    public function testTwoTimesTwhEqualsFour()
    {
        $this->assertEquals(4, 2*2);
    }
}