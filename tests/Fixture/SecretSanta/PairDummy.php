<?php

/*
 * This file is part of the VantomasWebsite package.
 *
 * (c) Thomas Juhnke <dev@van-tomas.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DreadLabs\VantomasWebsite\Tests\Fixture\SecretSanta;

use DreadLabs\VantomasWebsite\SecretSanta\Donee\DoneeInterface;
use DreadLabs\VantomasWebsite\SecretSanta\Donor\DonorInterface;
use DreadLabs\VantomasWebsite\SecretSanta\Pair\PairInterface;

/**
 * PairDummy
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
class PairDummy implements PairInterface
{

    /**
     * {@inheritdoc}
     */
    public function getDonor()
    {
    }

    /**
     * {@inheritdoc}
     */
    public function setDonor(DonorInterface $donor)
    {
    }

    /**
     * {@inheritdoc}
     */
    public function getDonee()
    {
    }

    /**
     * {@inheritdoc}
     */
    public function setDonee(DoneeInterface $donee)
    {
    }
}
