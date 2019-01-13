<?php

class FunctionTest extends \PHPUnit\Framework\TestCase
{
    public function testAddReturnsTheCorrectSum()
    {
        $this->assertEquals(4, add(2,2));
        $this->assertEquals('4', add(2,2));
    }

    public function testAddNotReturnsTheCorrectSum()
    {
        $this->assertNotEquals(24, add(2,2));
    }
}