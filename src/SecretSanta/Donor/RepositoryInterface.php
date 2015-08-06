<?php

/*
 * This file is part of the VantomasWebsite package.
 *
 * (c) Thomas Juhnke <dev@van-tomas.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DreadLabs\VantomasWebsite\SecretSanta\Donor;

use DreadLabs\VantomasWebsite\User\UserIdInterface;

/**
 * RepositoryInterface
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
interface RepositoryInterface
{

    /**
     * Finds one donor by its UserId
     *
     * @param UserIdInterface $donorId The UserId of the donor
     *
     * @return DonorInterface
     */
    public function findOneById(UserIdInterface $donorId);
}
