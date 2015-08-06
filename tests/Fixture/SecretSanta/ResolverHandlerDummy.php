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
use DreadLabs\VantomasWebsite\SecretSanta\Donee\ResolverHandlerInterface;
use DreadLabs\VantomasWebsite\SecretSanta\Donor\DonorInterface;

/**
 * ResolverHandlerDummy
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
class ResolverHandlerDummy implements ResolverHandlerInterface
{

    /**
     * {@inheritdoc}
     */
    public function resolve(DonorInterface $donor)
    {
    }
}
