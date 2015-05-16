<?php
namespace DreadLabs\VantomasWebsite\Tests\Fixture\SecretSanta;

use DreadLabs\VantomasWebsite\SecretSanta\Donee\DoneeInterface;
use DreadLabs\VantomasWebsite\SecretSanta\Donee\RepositoryInterface;
use DreadLabs\VantomasWebsite\SecretSanta\Donor\DonorInterface;

class DoneeRepositoryDummy implements RepositoryInterface
{

    /**
     * Tries to find a non-mutual donee for the given donor
     *
     * @param DonorInterface $donor The Donor
     *
     * @return DoneeInterface
     */
    public function findOneNonMutualFor(DonorInterface $donor)
    {
        // TODO: Implement findOneNonMutualFor() method.
    }

    /**
     * Finds a donee at random
     *
     * Needs the donor to build the exclude statement of the query.
     *
     * @param DonorInterface $donor The Donor to exclude by query
     *
     * @return DoneeInterface
     */
    public function findOneAtRandomFor(DonorInterface $donor)
    {
        // TODO: Implement findOneAtRandomFor() method.
    }
}
