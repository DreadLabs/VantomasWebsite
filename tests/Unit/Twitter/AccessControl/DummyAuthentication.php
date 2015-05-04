<?php
namespace DreadLabs\VantomasWebsite\Tests\Unit\Twitter\AccessControl;

use DreadLabs\VantomasWebsite\Twitter\AccessControl\AuthenticationInterface;

class DummyAuthentication implements AuthenticationInterface
{

    /**
     * "has a token?"
     *
     * @return bool
     */
    public function isAuthenticated()
    {
        // TODO: Implement isAuthenticated() method.
    }

    /**
     * @param string $attribute
     * @return void
     */
    public function addAttribute($attribute)
    {
        // TODO: Implement addAttribute() method.
    }

    /**
     * Returns a string representation of authentication attributes.
     *
     * E.g. a username / password combination, separated by a colon.
     *
     * @return string
     */
    public function toString()
    {
        // TODO: Implement toString() method.
    }
}
