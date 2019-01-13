<?php

class UserTest extends \PHPUnit\Framework\TestCase
{
    protected static $user;

    public function setUp()
    {
        $mockMailer = $this->createMock(Mailer::class);

        static::$user = new User($mockMailer);

        $mockMailer
            ->expects($this->any())
            ->method('sendMessage')
            ->with($this->equalTo('sakis@test.com'), $this->equalTo('test'))
            ->willReturn(true);
    }

    public function testReturnFullName()
    {
        static::$user->first_name = 'sakis';

        static::$user->last_name = 'Nikolopoulos';

        $this->assertEquals('sakis Nikolopoulos', static::$user->getFullName());
    }

    public function test_full_name_is_empty()
    {
        $this->assertEquals('', static::$user->getFullName());
    }

    public function testTrueIsTrue()
    {
        $this->assertTrue(true);
    }

    public function testNotificationIsSend()
    {
        static::$user->email = 'sakis@test.com';

        $result = static::$user->notify('test');

        $this->assertTrue($result);
    }

    public function testCannotNotifyIfUserNoMail()
    {
        $mock_mailer = $this->createMock(Mailer::class);

        $mock_mailer->method('sendMessage')
                    ->will($this->throwException(new Exception()));

        $user = new User($mock_mailer);

        $this->expectException(Exception::class);

        $user->notify('test');
    }


}