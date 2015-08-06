<?php

/*
 * This file is part of the VantomasWebsite package.
 *
 * (c) Thomas Juhnke <dev@van-tomas.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DreadLabs\VantomasWebsite\Mail;

use DreadLabs\VantomasWebsite\Mail\Message\ViewInterface;

/**
 * ConfigurationInterface
 *
 * Provides an API for conveyables, views and messages in order
 * to configure them for delivery.
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
interface ConfigurationInterface
{

    /**
     * @param ConveyableInterface $conveyable
     *
     * @return void
     */
    public function initializeFor(ConveyableInterface $conveyable);

    /**
     * @param ViewInterface $view
     *
     * @return void
     */
    public function configureView(ViewInterface $view);

    /**
     * @param MessageInterface $message
     *
     * @return void
     */
    public function configureMessage(MessageInterface $message);
}
