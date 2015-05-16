<?php
namespace DreadLabs\VantomasWebsite\SecretSanta\Donor;

use DreadLabs\VantomasWebsite\User\UserIdInterface;

/**
 * RepositoryInterface
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
