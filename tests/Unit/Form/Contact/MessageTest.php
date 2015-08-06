<?php

/*
 * This file is part of the VantomasWebsite package.
 *
 * (c) Thomas Juhnke <dev@van-tomas.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DreadLabs\VantomasWebsite\Tests\Unit\Form\Contact;

use DreadLabs\VantomasWebsite\Form\Contact\Message;

/**
 * MessageTest
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
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
