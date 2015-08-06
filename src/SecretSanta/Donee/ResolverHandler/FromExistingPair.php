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
use DreadLabs\VantomasWebsite\SecretSanta\Donee\ResolverHandlerInterface;
use DreadLabs\VantomasWebsite\SecretSanta\Donor\DonorInterface;
use DreadLabs\VantomasWebsite\SecretSanta\Pair\RepositoryInterface;

/**
 * FromExistingPair
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
class FromExistingPair implements ResolverHandlerInterface
{

    /**
     * Next resolver within the chain
     *
     * @var ResolverHandlerInterface
     */
    private $nextResolver;

    /**
     * Pair Repository
     *
     * @var RepositoryInterface
     */
    private $pairRepository;

    /**
     * Constructor
     *
     * @param ResolverHandlerInterface $nextResolver Next resolver within the chain
     * @param RepositoryInterface $pairRepository PairRepository
     */
    public function __construct(
        ResolverHandlerInterface $nextResolver,
        RepositoryInterface $pairRepository
    ) {
        $this->nextResolver = $nextResolver;
        $this->pairRepository = $pairRepository;
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
        $pair = $this->pairRepository->findPairFor($donor);

        if (!is_null($pair)) {
            return $pair->getDonee();
        }

        return $this->nextResolver->resolve($donor);
    }
}
