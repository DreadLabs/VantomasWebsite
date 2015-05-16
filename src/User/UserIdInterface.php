<?php
namespace DreadLabs\VantomasWebsite\User;

/**
 * UserIdInterface
 *
 * Represents a UserId value object interface which can be
 * refined for backend or frontend purposes.
 */
interface UserIdInterface
{

    /**
     * Named constructor
     *
     * @param int $userId The User id
     *
     * @return UserIdInterface
     */
    public static function fromString($userId);

    /**
     * Named constructor
     *
     * Use this in your concrete impl to create a UserId
     * for a logged in user in backend or frontend contexts.
     *
     * @return UserIdInterface
     */
    public static function fromLoggedInUser();

    /**
     * Returns the user id value
     *
     * @return int
     */
    public function getValue();
}
