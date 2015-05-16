<?php
namespace DreadLabs\VantomasWebsite\Tests\Fixture\Event;

use DreadLabs\VantomasWebsite\Event\ContextInterface;
use DreadLabs\VantomasWebsite\Event\EventInterface;

class EventContextDummy implements ContextInterface
{

    /**
     * Sets the namespace of the context
     *
     * @param string $namespace
     * @return void
     */
    public function setNamespace($namespace)
    {
        // TODO: Implement setNamespace() method.
    }

    /**
     * Dispatches the given event
     *
     * @param EventInterface $event
     * @return mixed
     */
    public function dispatch(EventInterface $event)
    {
        // TODO: Implement dispatch() method.
    }
}
