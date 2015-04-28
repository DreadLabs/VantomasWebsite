<?php
namespace DreadLabs\VantomasWebsite\Tests\Unit\Mail\Message;

use DreadLabs\VantomasWebsite\Mail\Message\ViewInterface;
use DreadLabs\VantomasWebsite\Mail\MessageInterface;

class ViewDummy implements ViewInterface
{

    /**
     * @param $template
     * @return void
     */
    public function setTemplate($template)
    {
        // TODO: Implement setTemplate() method.
    }

    /**
     * @param array $variables
     * @return void
     */
    public function setVariables(array $variables)
    {
        // TODO: Implement setVariables() method.
    }

    /**
     * @param MessageInterface $message
     * @return void
     */
    public function render(MessageInterface $message)
    {
        // TODO: Implement render() method.
    }
}
