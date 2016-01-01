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

use DreadLabs\VantomasWebsite\CodeSnippet\BrushInterface;

/**
 * RegisterCodeSnippetBrush
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
class RegisterCodeSnippetBrush implements EventInterface
{

    /**
     * @var array
     */
    private $arguments = array();

    /**
     * Returns the label of the event
     *
     * @return string
     */
    public function getLabel()
    {
        $explodedNamespace = explode('\\', __CLASS__, 4);

        return array_pop($explodedNamespace);
    }

    /**
     * Adds an argument to the event payload
     *
     * @param mixed $argument
     *
     * @return void
     */
    public function addArgument($argument)
    {
        array_push($this->arguments, $argument);
    }

    /**
     * Returns the event payload
     *
     * @return array
     */
    public function getArguments()
    {
        return $this->arguments;
    }

    /**
     * Named constructor
     *
     * @param BrushInterface $brush
     *
     * @return RegisterCodeSnippetBrush
     *
     */
    public static function fromBrush(BrushInterface $brush)
    {
        $event = new static();
        $event->addArgument($brush);

        return $event;
    }
}
