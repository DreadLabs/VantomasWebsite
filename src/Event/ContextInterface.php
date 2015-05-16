<?php
namespace DreadLabs\VantomasWebsite\Event;

/**
 * ContextInterface
 */
interface ContextInterface
{

    /**
     * Sets the namespace of the context
     *
     * @param string $namespace
     * @return void
     */
    public function setNamespace($namespace);

    /**
     * Dispatches the given event
     *
     * @param EventInterface $event
     * @return mixed
     */
    public function dispatch(EventInterface $event);
}
