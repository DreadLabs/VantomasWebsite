<?php
namespace DreadLabs\VantomasWebsite\Event;

/**
 * EventInterface
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
