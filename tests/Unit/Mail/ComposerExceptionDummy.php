<?php
namespace DreadLabs\VantomasWebsite\Tests\Unit\Mail;

use DreadLabs\VantomasWebsite\Mail\ComposerInterface;
use DreadLabs\VantomasWebsite\Mail\ConveyableInterface;
use DreadLabs\VantomasWebsite\Mail\Exception\FailedRecipientsException;
use DreadLabs\VantomasWebsite\Mail\MessageInterface;

class ComposerExceptionDummy implements ComposerInterface
{

    /**
     * @param ConveyableInterface $conveyable
     * @return MessageInterface
     * @throws FailedRecipientsException
     */
    public function compose(ConveyableInterface $conveyable)
    {
        throw new FailedRecipientsException();
    }
}