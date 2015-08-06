<?php

/*
 * This file is part of the VantomasWebsite package.
 *
 * (c) Thomas Juhnke <dev@van-tomas.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DreadLabs\VantomasWebsite\Tests\Unit\Mail\Message;

use DreadLabs\VantomasWebsite\Mail\Message\ViewInterface;
use DreadLabs\VantomasWebsite\Mail\MessageInterface;

/**
 * ViewDummy
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
class ViewDummy implements ViewInterface
{

    /**
     * {@inheritdoc}
     */
    public function setTemplate($template)
    {
    }

    /**
     * {@inheritdoc}
     */
    public function setVariables(array $variables)
    {
    }

    /**
     * {@inheritdoc}
     */
    public function render(MessageInterface $message)
    {
    }
}
