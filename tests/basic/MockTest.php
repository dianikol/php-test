<?php

class MockTest extends \PHPUnit\Framework\TestCase
{
    public function testMock()
    {
        $mailer = $this->createMock(Mailer::class);

        $mailer->method('sendMessage')->willReturn(true);

        $result = $mailer->sendMessage('sakis@test.com', 'Test message');

        $this->assertTrue($result);
    }

}