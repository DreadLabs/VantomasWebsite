<?php

/*
 * This file is part of the VantomasWebsite package.
 *
 * (c) Thomas Juhnke <dev@van-tomas.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DreadLabs\VantomasWebsite\Event;

/**
 * EventInterface
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
interface EventInterface
{

    /**
     * Returns the label of the event
     *
     * @return string
     */
    public function getLabel();

    /**
     * Adds an argument to the event payload
     *
     * @param mixed $argument
     *
     * @return void
     */
    public function addArgument($argument);

    /**
     * Returns the event payload
     *
     * @return array
     */
    public function getArguments();
}
