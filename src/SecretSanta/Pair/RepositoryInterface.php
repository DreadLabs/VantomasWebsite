<?php

/*
 * This file is part of the VantomasWebsite package.
 *
 * (c) Thomas Juhnke <dev@van-tomas.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DreadLabs\VantomasWebsite\SecretSanta\Pair;

use DreadLabs\VantomasWebsite\SecretSanta\Donee\DoneeInterface;
use DreadLabs\VantomasWebsite\SecretSanta\Donor\DonorInterface;

/**
 * RepositoryInterface
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
interface RepositoryInterface
{

    /**
     * Finds a pair for the given donor
     *
     * @param DonorInterface $donor
     *
     * @return PairInterface
     */
    public function findPairFor(DonorInterface $donor);

    /**
     * Determines if the given donor/donee pair is mutual
     *
     * @param DonorInterface $donor
     * @param DoneeInterface $donee
     *
     * @return bool
     */
    public function isPairMutually(DonorInterface $donor, DoneeInterface $donee);

    /**
     * Flags if the incoming donor / donee pair is already existing
     *
     * @param DonorInterface $donor
     * @param DoneeInterface $donee
     *
     * @return bool
     */
    public function isPairExisting(DonorInterface $donor, DoneeInterface $donee);

    /**
     * @param PairInterface $pair
     *
     * @return void
     */
    public function attach(PairInterface $pair);
}
