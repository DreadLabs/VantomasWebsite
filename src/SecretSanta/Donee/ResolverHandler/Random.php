<?php

/*
 * This file is part of the VantomasWebsite package.
 *
 * (c) Thomas Juhnke <dev@van-tomas.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DreadLabs\VantomasWebsite\SecretSanta\Donee\ResolverHandler;

use DreadLabs\VantomasWebsite\SecretSanta\Donee\DoneeInterface;
use DreadLabs\VantomasWebsite\SecretSanta\Donee\RepositoryInterface;
use DreadLabs\VantomasWebsite\SecretSanta\Donee\ResolverHandlerInterface;
use DreadLabs\VantomasWebsite\SecretSanta\Donor\DonorInterface;

/**
 * Random
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
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
