<?php
namespace DreadLabs\VantomasWebsite\SecretSanta\Donee;

use DreadLabs\VantomasWebsite\SecretSanta\Donor\DonorInterface;

/**
 * RepositoryInterface
 */
interface RepositoryInterface
{

    /**
     * Tries to find a non-mutual donee for the given donor
     *
     * @param DonorInterface $donor The Donor
     *
     * @return DoneeInterface
     */
    public function findOneNonMutualFor(DonorInterface $donor);

    /**
     * Finds a donee at random
     *
     * Needs the donor to build the exclude statement of the query.
     *
     * @param DonorInterface $donor The Donor to exclude by query
     *
     * @return DoneeInterface
     */
    public function findOneAtRandomFor(DonorInterface $donor);
}
