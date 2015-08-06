<?php

/*
 * This file is part of the VantomasWebsite package.
 *
 * (c) Thomas Juhnke <dev@van-tomas.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DreadLabs\VantomasWebsite\SecretSanta\Donee;

use DreadLabs\VantomasWebsite\SecretSanta\Donor\DonorInterface;

/**
 * RepositoryInterface
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
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
