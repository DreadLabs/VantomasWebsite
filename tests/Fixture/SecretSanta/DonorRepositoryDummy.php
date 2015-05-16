<?php
namespace DreadLabs\VantomasWebsite\Tests\Fixture\SecretSanta;

use DreadLabs\VantomasWebsite\SecretSanta\Donor\DonorInterface;
use DreadLabs\VantomasWebsite\SecretSanta\Donor\RepositoryInterface;
use DreadLabs\VantomasWebsite\User\UserIdInterface;

class DonorRepositoryDummy implements RepositoryInterface
{

    /**
     * Finds one donor by its UserId
     *
     * @param UserIdInterface $donorId The UserId of the donor
     *
     * @return DonorInterface
     */
    public function findOneById(UserIdInterface $donorId)
    {
        // TODO: Implement findOneById() method.
    }
}
