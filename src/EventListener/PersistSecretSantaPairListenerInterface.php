<?php
namespace DreadLabs\VantomasWebsite\EventListener;

use DreadLabs\VantomasWebsite\SecretSanta\Donee\DoneeInterface;
use DreadLabs\VantomasWebsite\SecretSanta\Donor\DonorInterface;

/**
 * PersistSecretSantaPairListenerInterface
 */
interface PersistSecretSantaPairListenerInterface
{

    /**
     * Persists the given donor / donee pair
     *
     * @param DonorInterface $donor
     * @param DoneeInterface $donee
     * @return void
     */
    public function handle(DonorInterface $donor, DoneeInterface $donee);
}
