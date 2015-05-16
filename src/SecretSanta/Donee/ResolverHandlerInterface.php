<?php
namespace DreadLabs\VantomasWebsite\SecretSanta\Donee;

use DreadLabs\VantomasWebsite\SecretSanta\Donor\DonorInterface;

/**
 * ResolverHandlerInterface
 */
interface ResolverHandlerInterface
{

    /**
     * Resolves a Donee for the incoming donor
     *
     * @param DonorInterface $donor The donor to fetch a donee for
     *
     * @return DoneeInterface
     */
    public function resolve(DonorInterface $donor);
}
