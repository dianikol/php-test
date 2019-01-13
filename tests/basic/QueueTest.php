<?php

class QueueTest extends \PHPUnit\Framework\TestCase
{
    protected static $queue;

    public static function setUpBeforeClass()
    {
        static::$queue = new Queue();
    }

    public static function tearDownAfterClass()
    {
        static::$queue = null;
    }

    protected function setUp()
    {
        static::getQueue()->clear();
    }

    private static function getQueue(): Queue
    {
        return static::$queue;
    }

    protected function tearDown()
    {

    }

    public function testNewQueueIsEmpty()
    {
        $this->assertEquals(0, static::getQueue()->getCount());
    }

    public function testItemIsAddedToTheQueue()
    {
        $initalCount = static::getQueue()->getCount();

        static::getQueue()->push('test');

        $afterCount = static::getQueue()->getCount();

        $this->assertEquals(1, $afterCount - $initalCount);
    }

    public function testItemIsRemovedFromQueue()
    {
        static::getQueue()->push('test');

        $item = static::getQueue()->pop();

        $this->assertEquals(0, static::getQueue()->getCount());

        $this->assertEquals('test', $item);
    }

    public function testItmIsRemovedFromRheFrontOfTheArray()
    {
        static::getQueue()->push('first');

        static::getQueue()->push('second');

        $item = static::getQueue()->pop();

        $this->assertEquals('first', $item);
    }

    public function testArrayIsSame()
    {
        $this->assertEquals(['1', '2', '3'], ['1', '2', '3']);
    }

    public function testMaxNumberOfItemsCanBeAdded()
    {
        for ($i = 0; $i < static::getQueue()::MAX_ITEMS; $i++)
        {
            static::getQueue()->push($i);
        }

        $this->assertEquals(static::getQueue()::MAX_ITEMS, static::getQueue()->getCount());
    }

    public function testExcepetionWhenAddingItemToAFullQueue()
    {
        for ($i = 0; $i < static::getQueue()::MAX_ITEMS; $i++)
        {
            static::getQueue()->push($i);
        }

        $this->expectException(QueueException::class);

        static::getQueue()->push(static::getQueue()::MAX_ITEMS + 1);
    }
}