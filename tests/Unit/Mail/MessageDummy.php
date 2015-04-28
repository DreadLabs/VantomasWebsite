<?php
namespace DreadLabs\VantomasWebsite\Tests\Unit\Mail;

use DreadLabs\VantomasWebsite\Mail\Exception\FailedRecipientsException;
use DreadLabs\VantomasWebsite\Mail\MessageInterface;

class MessageDummy implements MessageInterface
{

    /**
     * @param array $sender
     * @return void
     */
    public function setSender(array $sender)
    {
        // TODO: Implement setSender() method.
    }

    /**
     * @param $receiver
     * @return void
     */
    public function setReceiver(array $receiver)
    {
        // TODO: Implement setReceiver() method.
    }

    /**
     * @param string $subject
     * @return void
     */
    public function setSubject($subject)
    {
        // TODO: Implement setSubject() method.
    }

    /**
     * @param string $htmlBody
     * @return void
     */
    public function setHtmlBody($htmlBody)
    {
        // TODO: Implement setHtmlBody() method.
    }

    /**
     * @param string $plainBody
     * @return void
     */
    public function setPlainBody($plainBody)
    {
        // TODO: Implement setPlainBody() method.
    }

    /**
     * @return void
     * @throws FailedRecipientsException
     */
    public function send()
    {
        // TODO: Implement send() method.
    }
}
