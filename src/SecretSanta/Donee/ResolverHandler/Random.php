<?php
namespace DreadLabs\VantomasWebsite\SecretSanta\Donee\ResolverHandler;

use DreadLabs\VantomasWebsite\SecretSanta\Donee\DoneeInterface;
use DreadLabs\VantomasWebsite\SecretSanta\Donee\RepositoryInterface;
use DreadLabs\VantomasWebsite\SecretSanta\Donee\ResolverHandlerInterface;
use DreadLabs\VantomasWebsite\SecretSanta\Donor\DonorInterface;

/**
 * Random
 */
class Random implements ResolverHandlerInterface
{

    /**
     * Donee Repository
     *
     * @var RepositoryInterface
     */
    private $doneeRepository;

    /**
     * Constructor
     *
     * @param RepositoryInterface $doneeRepository Donee Repository
     */
    public function __construct(
        RepositoryInterface $doneeRepository
    ) {
        $this->doneeRepository = $doneeRepository;
    }

    /**
     * Resolves a Donee for the incoming donor
     *
     * @param DonorInterface $donor The donor to fetch a donee for
     *
     * @return DoneeInterface
     */
    public function resolve(DonorInterface $donor)
    {
        return $this->doneeRepository->findOneAtRandomFor($donor);
    }
}
