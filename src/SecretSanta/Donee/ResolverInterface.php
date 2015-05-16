<?php
namespace DreadLabs\VantomasWebsite\SecretSanta\Donee;

use DreadLabs\VantomasWebsite\User\UserIdInterface;

/**
 * ResolverInterface
 */
interface ResolverInterface
{

    /**
     * Resolves a donee for the incoming donor user id
     *
     * @param UserIdInterface $donorId User id of the donor
     *
     * @return DoneeInterface A donee
     */
    public function resolveFor(UserIdInterface $donorId);
}
