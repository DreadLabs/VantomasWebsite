<?php
namespace DreadLabs\VantomasWebsite\Tests\Fixture\SecretSanta;

use DreadLabs\VantomasWebsite\SecretSanta\Donee\DoneeInterface;
use DreadLabs\VantomasWebsite\SecretSanta\Donor\DonorInterface;
use DreadLabs\VantomasWebsite\SecretSanta\Pair\PairInterface;
use DreadLabs\VantomasWebsite\SecretSanta\Pair\RepositoryInterface;

class PairRepositoryDummy implements RepositoryInterface
{

    /**
     * Finds a pair for the given donor
     *
     * @param DonorInterface $donor
     * @return PairInterface
     */
    public function findPairFor(DonorInterface $donor)
    {
        // TODO: Implement findPairFor() method.
    }

    /**
     * Determines if the given donor/donee pair is mutual
     *
     * @param DonorInterface $donor
     * @param DoneeInterface $donee
     * @return bool
     */
    public function isPairMutually(DonorInterface $donor, DoneeInterface $donee)
    {
        // TODO: Implement isPairMutually() method.
    }

    /**
     * @param PairInterface $pair
     * @return void
     */
    public function add(PairInterface $pair)
    {
        // TODO: Implement add() method.
    }
}
