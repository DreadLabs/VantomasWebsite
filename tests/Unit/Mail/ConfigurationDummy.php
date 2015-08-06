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

use DreadLabs\VantomasWebsite\Mail\ConfigurationInterface;
use DreadLabs\VantomasWebsite\Mail\ConveyableInterface;
use DreadLabs\VantomasWebsite\Mail\Message\ViewInterface;
use DreadLabs\VantomasWebsite\Mail\MessageInterface;

/**
 * ConfigurationDummy
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
class ConfigurationDummy implements ConfigurationInterface
{

    /**
     * {@inheritdoc}
     */
    public function initializeFor(ConveyableInterface $conveyable)
    {
    }

    /**
     * {@inheritdoc}
     */
    public function configureView(ViewInterface $view)
    {
    }

    /**
     * {@inheritdoc}
     */
    public function configureMessage(MessageInterface $message)
    {
    }
}
