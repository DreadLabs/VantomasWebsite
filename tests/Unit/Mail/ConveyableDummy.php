<?php
namespace DreadLabs\VantomasWebsite\Tests\Unit\Mail;

use DreadLabs\VantomasWebsite\Mail\ConveyableInterface;
use DreadLabs\VantomasWebsite\Mail\Message\ViewInterface;

class ConveyableDummy implements ConveyableInterface
{

    /**
     * @param ViewInterface $view
     * @return void
     */
    public function setMailMessageViewData(ViewInterface $view)
    {
        // TODO: Implement setMailMessageViewData() method.
    }
}
