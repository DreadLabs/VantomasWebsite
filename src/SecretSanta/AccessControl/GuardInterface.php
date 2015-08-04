<?php
namespace DreadLabs\VantomasWebsite\SecretSanta\AccessControl;

interface GuardInterface
{

    /**
     * Flags if the current request has an authenticated user
     *
     * @return void
     *
     * @throws UnauthenticatedException
     */
    public function assertAuthenticatedUser();
}
