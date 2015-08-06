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

use DreadLabs\VantomasWebsite\User\UserIdInterface;

/**
 * ResolverInterface
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
interface ResolverInterface
{

    /**
     * Resolves a donee for the incoming donor user id
     *
     * @param UserIdInterface $donorId User id of the donor
     *
     * @return DoneeInterface A donee
     */
    public function resolveFor(UserIdInterface $donorId);
}
