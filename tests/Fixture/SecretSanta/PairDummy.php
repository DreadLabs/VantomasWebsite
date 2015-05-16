<?php
namespace DreadLabs\VantomasWebsite\Tests\Fixture\SecretSanta;

use DreadLabs\VantomasWebsite\SecretSanta\Donee\DoneeInterface;
use DreadLabs\VantomasWebsite\SecretSanta\Donor\DonorInterface;
use DreadLabs\VantomasWebsite\SecretSanta\Pair\PairInterface;

class PairDummy implements PairInterface
{

    public function getDonor()
    {
        // TODO: Implement getDonor() method.
    }

    public function setDonor(DonorInterface $donor)
    {
        // TODO: Implement setDonor() method.
    }

    public function getDonee()
    {
        // TODO: Implement getDonee() method.
    }

    public function setDonee(DoneeInterface $donee)
    {
        // TODO: Implement setDonee() method.
    }
}
