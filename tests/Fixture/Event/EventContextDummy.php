<?php

/*
 * This file is part of the VantomasWebsite package.
 *
 * (c) Thomas Juhnke <dev@van-tomas.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DreadLabs\VantomasWebsite\Tests\Fixture\Event;

use DreadLabs\VantomasWebsite\Event\ContextInterface;
use DreadLabs\VantomasWebsite\Event\EventInterface;

/**
 * EventContextDummy
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
class EventContextDummy implements ContextInterface
{

    /**
     * {@inheritdoc}
     */
    public function setNamespace($namespace)
    {
    }

    /**
     * {@inheritdoc}
     */
    public function dispatch(EventInterface $event)
    {
    }
}
