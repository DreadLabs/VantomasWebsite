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
 * ContextInterface
 *
 * Gives context to events in a pub-sub event system.
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
interface ContextInterface
{

    /**
     * Sets the namespace of the context
     *
     * @param string $namespace
     *
     * @return void
     */
    public function setNamespace($namespace);

    /**
     * Dispatches the given event
     *
     * @param EventInterface $event
     *
     * @return mixed
     */
    public function dispatch(EventInterface $event);
}
