<?php
namespace DreadLabs\VantomasWebsite\Tests\Fixture\SecretSanta;

use DreadLabs\VantomasWebsite\SecretSanta\Donee\DoneeInterface;
use DreadLabs\VantomasWebsite\SecretSanta\Donee\ResolverHandlerInterface;
use DreadLabs\VantomasWebsite\SecretSanta\Donor\DonorInterface;

class ResolverHandlerDummy implements ResolverHandlerInterface
{

    /**
     * Resolves a Donee for the incoming donor
     *
     * @param DonorInterface $donor The donor to fetch a donee for
     *
     * @return DoneeInterface
     */
    public function resolve(DonorInterface $donor)
    {
        // TODO: Implement resolve() method.
    }
}
