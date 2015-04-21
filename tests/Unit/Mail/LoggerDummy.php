<?php
namespace DreadLabs\VantomasWebsite\Tests\Unit\Mail;

use DreadLabs\VantomasWebsite\Mail\LoggerInterface;

class LoggerDummy implements LoggerInterface
{

    /**
     * @param string $message
     * @param array $context
     * @return void
     */
    public function alert($message, array $context = array())
    {
        // TODO: Implement alert() method.
    }
}
