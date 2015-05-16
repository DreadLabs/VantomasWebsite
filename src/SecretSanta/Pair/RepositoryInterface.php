<?php
namespace DreadLabs\VantomasWebsite\SecretSanta\Pair;

use DreadLabs\VantomasWebsite\SecretSanta\Donee\DoneeInterface;
use DreadLabs\VantomasWebsite\SecretSanta\Donor\DonorInterface;

interface RepositoryInterface
{

    /**
     * Finds a pair for the given donor
     *
     * @param DonorInterface $donor
     * @return PairInterface
     */
    public function findPairFor(DonorInterface $donor);

    /**
     * Determines if the given donor/donee pair is mutual
     *
     * @param DonorInterface $donor
     * @param DoneeInterface $donee
     * @return bool
     */
    public function isPairMutually(DonorInterface $donor, DoneeInterface $donee);

    /**
     * Flags if the incoming donor / donee pair is already existing
     *
     * @param DonorInterface $donor
     * @param DoneeInterface $donee
     * @return bool
     */
    public function isPairExisting(DonorInterface $donor, DoneeInterface $donee);

    /**
     * @param PairInterface $pair
     * @return void
     */
    public function attach(PairInterface $pair);
}
