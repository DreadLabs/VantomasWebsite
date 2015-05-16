<?php
namespace DreadLabs\VantomasWebsite\User;

/**
 * AbstractUserId
 *
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
     * @return static
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
