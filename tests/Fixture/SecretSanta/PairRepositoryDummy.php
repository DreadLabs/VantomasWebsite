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
use DreadLabs\VantomasWebsite\SecretSanta\Pair\RepositoryInterface;

/**
 * PairRepositoryDummy
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
class PairRepositoryDummy implements RepositoryInterface
{

    /**
     * {@inheritdoc}
     */
    public function findPairFor(DonorInterface $donor)
    {
    }

    /**
     * {@inheritdoc}
     */
    public function isPairMutually(DonorInterface $donor, DoneeInterface $donee)
    {
    }

    /**
     * {@inheritdoc}
     */
    public function attach(PairInterface $pair)
    {
    }

    /**
     * {@inheritdoc}
     */
    public function isPairExisting(DonorInterface $donor, DoneeInterface $donee)
    {
    }
}
