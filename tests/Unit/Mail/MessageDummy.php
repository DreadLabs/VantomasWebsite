<?php

/*
 * This file is part of the VantomasWebsite package.
 *
 * (c) Thomas Juhnke <dev@van-tomas.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace DreadLabs\VantomasWebsite\Tests\Unit\Mail;

use DreadLabs\VantomasWebsite\Mail\Exception\FailedRecipientsException;
use DreadLabs\VantomasWebsite\Mail\MessageInterface;

/**
 * MessageDummy
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
class MessageDummy implements MessageInterface
{

    /**
     * {@inheritdoc}
     */
    public function setSender(array $sender)
    {
    }

    /**
     * {@inheritdoc}
     */
    public function setReceiver(array $receiver)
    {
    }

    /**
     * {@inheritdoc}
     */
    public function setSubject($subject)
    {
    }

    /**
     * {@inheritdoc}
     */
    public function setHtmlBody($htmlBody)
    {
    }

    /**
     * {@inheritdoc}
     */
    public function setPlainBody($plainBody)
    {
    }

    /**
     * {@inheritdoc}
     */
    public function send()
    {
    }
}
