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

use DreadLabs\VantomasWebsite\SecretSanta\Donor\DonorInterface;
use DreadLabs\VantomasWebsite\SecretSanta\Donor\RepositoryInterface;
use DreadLabs\VantomasWebsite\User\UserIdInterface;

/**
 * DonorRepositoryDummy
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
class DonorRepositoryDummy implements RepositoryInterface
{

    /**
     * {@inheritdoc}
     */
    public function findOneById(UserIdInterface $donorId)
    {
    }
}
