<?php

/*
 * This file is part of the VantomasWebsite package.
 *
 * (c) Thomas Juhnke <dev@van-tomas.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DreadLabs\VantomasWebsite\EventListener;

use DreadLabs\VantomasWebsite\SecretSanta\Donee\DoneeInterface;
use DreadLabs\VantomasWebsite\SecretSanta\Donor\DonorInterface;

/**
 * PersistSecretSantaPairListenerInterface
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
interface PersistSecretSantaPairListenerInterface
{

    /**
     * Persists the given donor / donee pair
     *
     * @param DonorInterface $donor
     * @param DoneeInterface $donee
     *
     * @return void
     */
    public function handle(DonorInterface $donor, DoneeInterface $donee);
}
