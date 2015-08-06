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
 * PairInterface
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
interface PairInterface
{

    /**
     * @return DonorInterface
     */
    public function getDonor();

    /**
     * @param DonorInterface $donor
     *
     * @return void
     */
    public function setDonor(DonorInterface $donor);

    /**
     * @return DoneeInterface
     */
    public function getDonee();

    /**
     * @param DoneeInterface $donee
     *
     * @return void
     */
    public function setDonee(DoneeInterface $donee);
}
