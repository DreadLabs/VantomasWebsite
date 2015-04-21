<?php
namespace DreadLabs\VantomasWebsite\Tests\Unit\Form\Contact;

use DreadLabs\VantomasWebsite\Form\Contact\Message;

class MessageTest extends \PHPUnit_Framework_TestCase
{

    public function testMessageReturnsSameSubject()
    {
        $subject = 'I\'m your pusher!';
        $sut = new Message();
        $sut->setSubject($subject);

        $this->assertSame($subject, $sut->getSubject());
    }

    public function testMessageReturnsSameMessageBody()
    {
        $message = '!rehsup rouy m/\'I';
        $sut = new Message();
        $sut->setMessage($message);

        $this->assertSame($message, $sut->getMessage());
    }
}
