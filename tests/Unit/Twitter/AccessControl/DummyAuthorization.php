<?php
namespace DreadLabs\VantomasWebsite\Tests\Unit\Twitter\AccessControl;

use DreadLabs\VantomasWebsite\Twitter\AccessControl\AuthenticationInterface;
use DreadLabs\VantomasWebsite\Twitter\AccessControl\AuthorizationInterface;
use DreadLabs\VantomasWebsite\Twitter\AccessControl\Exception\AuthorizationFailedException;

class DummyAuthorization implements AuthorizationInterface
{

    /**
     * Sets credentials on AuthenticationInterface
     *
     * @param AuthenticationInterface $authentication
     * @return void
     * @throws AuthorizationFailedException
     */
    public function authorize(AuthenticationInterface $authentication)
    {
        // TODO: Implement authorize() method.
    }
}
