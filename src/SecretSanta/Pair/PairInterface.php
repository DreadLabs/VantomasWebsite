<?php
namespace DreadLabs\VantomasWebsite\SecretSanta\Pair;

use DreadLabs\VantomasWebsite\SecretSanta\Donee\DoneeInterface;
use DreadLabs\VantomasWebsite\SecretSanta\Donor\DonorInterface;

interface PairInterface
{

    public function getDonor();

    public function setDonor(DonorInterface $donor);

    public function getDonee();

    public function setDonee(DoneeInterface $donee);
}
