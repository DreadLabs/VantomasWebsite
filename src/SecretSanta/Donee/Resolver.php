<?php

/*
 * This file is part of the VantomasWebsite package.
 *
 * (c) Thomas Juhnke <dev@van-tomas.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DreadLabs\VantomasWebsite\SecretSanta\Donee;

use DreadLabs\VantomasWebsite\Event\ContextInterface;
use DreadLabs\VantomasWebsite\Event\FoundDonee;
use DreadLabs\VantomasWebsite\SecretSanta\Donee\ResolverHandler\FactoryInterface;
use DreadLabs\VantomasWebsite\SecretSanta\Donee\ResolverHandler\FromExistingPair;
use DreadLabs\VantomasWebsite\SecretSanta\Donee\ResolverHandler\NonMutual;
use DreadLabs\VantomasWebsite\SecretSanta\Donee\ResolverHandler\Random;
use DreadLabs\VantomasWebsite\SecretSanta\Donor\RepositoryInterface as DonorRepositoryInterface;
use DreadLabs\VantomasWebsite\User\UserIdInterface;

/**
 * Resolver
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
class Resolver implements ResolverInterface
{

    /**
     * Donor Repository
     *
     * @var DonorRepositoryInterface
     */
    private $donorRepository;

    /**
     * A resolver factory
     *
     * @var FactoryInterface
     */
    private $resolverFactory;

    /**
     * Event context
     *
     * @var ContextInterface
     */
    private $eventContext;

    /**
     * Constructor
     *
     * @param DonorRepositoryInterface $donorRepository Donor Repository
     * @param FactoryInterface $resolverFactory A resolver factory
     * @param ContextInterface $eventContext
     */
    public function __construct(
        DonorRepositoryInterface $donorRepository,
        FactoryInterface $resolverFactory,
        ContextInterface $eventContext
    ) {
        $this->donorRepository = $donorRepository;
        $this->resolverFactory = $resolverFactory;
        $this->eventContext = $eventContext;
        $this->eventContext->setNamespace(__CLASS__);
    }

    /**
     * Resolves a donee for the incoming donor user id
     *
     * @param UserIdInterface $donorId User id of the donor
     *
     * @return DoneeInterface A donee
     */
    public function resolveFor(UserIdInterface $donorId)
    {
        $donor = $this->donorRepository->findOneById($donorId);

        $donee = $this->getResolverHandlerChain()->resolve($donor);

        $this->eventContext->dispatch(FoundDonee::fromPair($donor, $donee));

        return $donee;
    }

    /**
     * Builds and returns the resolver handler chain
     *
     * @return ResolverHandlerInterface
     */
    private function getResolverHandlerChain()
    {
        $randomResolver = $this->resolverFactory->create(Random::class);
        $nonMutualResolver = $this->resolverFactory->create(NonMutual::class, $randomResolver);

        return $this->resolverFactory->create(FromExistingPair::class, $nonMutualResolver);
    }
}
