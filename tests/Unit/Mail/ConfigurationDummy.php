<?php
namespace DreadLabs\VantomasWebsite\Tests\Unit\Mail;

use DreadLabs\VantomasWebsite\Mail\ConfigurationInterface;
use DreadLabs\VantomasWebsite\Mail\ConveyableInterface;
use DreadLabs\VantomasWebsite\Mail\Message\ViewInterface;
use DreadLabs\VantomasWebsite\Mail\MessageInterface;

class ConfigurationDummy implements ConfigurationInterface
{

    /**
     * @param ConveyableInterface $conveyable
     * @return void
     */
    public function initializeFor(ConveyableInterface $conveyable)
    {
        // TODO: Implement initializeFor() method.
    }

    /**
     * @param ViewInterface $view
     * @return void
     */
    public function configureView(ViewInterface $view)
    {
        // TODO: Implement configureView() method.
    }

    /**
     * @param MessageInterface $message
     * @return void
     */
    public function configureMessage(MessageInterface $message)
    {
        // TODO: Implement configureMessage() method.
    }
}
