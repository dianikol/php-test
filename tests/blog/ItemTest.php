<?php

class ItemTest extends \PHPUnit\Framework\TestCase
{
    /**
     * Description Is Not Empty
     */
    public function testDescriptionIsNotEmpty()
    {
        $item = new Item();

        $this->assertNotEmpty($item->getDescription());
    }

    /**
     * Id Is An Integer
     */
    public function testIdIsAnInteger()
    {
        $item = new ItemChild();

        $this->assertInternalType('int', $item->getID());
    }

    /**
     * Token Is An String
     */
    public function testTokenIsAnString()
    {
        $item = new Item();

        $reflection = new ReflectionClass(Item::class);

        $method = $reflection->getMethod('getToken');

        $method->setAccessible(true);

        $result = $method->invoke($item);

        $this->assertInternalType('string', $result);
    }

}