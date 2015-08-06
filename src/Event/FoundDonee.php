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

use DreadLabs\VantomasWebsite\SecretSanta\Donee\DoneeInterface;
use DreadLabs\VantomasWebsite\SecretSanta\Donor\DonorInterface;

/**
 * FoundDonee
 *
 * Event which will be triggered by the SecretSanta donee resolver if
 * a donee was found.
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
class FoundDonee implements EventInterface
{

    /**
     * @var array
     */
    private $arguments = array();

    /**
     * @return string
     */
    public function getLabel()
    {
        $explodedNamespace = explode('\\', __CLASS__, 4);

        return array_pop($explodedNamespace);
    }

    /**
     * @param mixed $argument
     *
     * @return void
     */
    public function addArgument($argument)
    {
        array_push($this->arguments, $argument);
    }

    /**
     * @return array
     */
    public function getArguments()
    {
        return $this->arguments;
    }


    /**
     * Named constructor
     *
     * Creates a found donee event
     *
     * @param DonorInterface $donor
     * @param DoneeInterface $donee
     *
     * @return self
     */
    public static function fromPair(DonorInterface $donor, DoneeInterface $donee)
    {
        $event = new static();
        $event->addArgument($donor);
        $event->addArgument($donee);

        return $event;
    }
}
