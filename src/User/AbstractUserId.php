<?php

/*
 * This file is part of the VantomasWebsite package.
 *
 * (c) Thomas Juhnke <dev@van-tomas.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DreadLabs\VantomasWebsite\User;

/**
 * AbstractUserId
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
abstract class AbstractUserId implements UserIdInterface
{

    /**
     * The User id value
     *
     * @var int
     */
    private $value;

    /**
     * Constructor
     *
     * @param int $userId The user id
     */
    public function __construct($userId)
    {
        $this->value = (int) $userId;
    }

    /**
     * Named constructor
     *
     * @param int $userId The user id
     *
     * @return self
     */
    public static function fromString($userId)
    {
        return new static($userId);
    }

    /**
     * Returns the user id value
     *
     * @return int
     */
    public function getValue()
    {
        return $this->value;
    }
}
