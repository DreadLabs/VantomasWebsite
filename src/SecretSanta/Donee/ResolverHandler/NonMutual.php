<?php
namespace DreadLabs\VantomasWebsite\SecretSanta\Donee\ResolverHandler;

use DreadLabs\VantomasWebsite\SecretSanta\Donee\DoneeInterface;
use DreadLabs\VantomasWebsite\SecretSanta\Donee\RepositoryInterface as DoneeRepositoryInterface;
use DreadLabs\VantomasWebsite\SecretSanta\Donee\ResolverHandlerInterface;
use DreadLabs\VantomasWebsite\SecretSanta\Donor\DonorInterface;
use DreadLabs\VantomasWebsite\SecretSanta\Pair\RepositoryInterface as PairRepositoryInterface;

/**
 * NonMutual
 */
class NonMutual implements ResolverHandlerInterface
{

    /**
     * Amount of maximum loops to find a non-mutual donee
     *
     * @var int
     */
    const MAX_MUTUAL_LOOP = 1000;

    /**
     * Next resolver within the chain
     *
     * @var ResolverHandlerInterface
     */
    private $nextResolver;

    /**
     * Donee Repository
     *
     * @var DoneeRepositoryInterface
     */
    private $doneeRepository;

    /**
     * Pair Repository
     *
     * @var PairRepositoryInterface
     */
    private $pairRepository;

    /**
     * Constructor
     *
     * @param ResolverHandlerInterface $nextResolver Next resolver within the chain
     * @param DoneeRepositoryInterface $doneeRepository Donee Repository
     * @param PairRepositoryInterface $pairRepository PairRepository
     */
    public function __construct(
        ResolverHandlerInterface $nextResolver,
        DoneeRepositoryInterface $doneeRepository,
        PairRepositoryInterface $pairRepository
    ) {
        $this->nextResolver = $nextResolver;
        $this->doneeRepository = $doneeRepository;
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
        $mutualIncrement = 0;

        do {
            $donee = $this->doneeRepository->findOneNonMutualFor($donor);

            $mutualIncrement++;

            if ($mutualIncrement >= self::MAX_MUTUAL_LOOP) {
                $donee = null;
                break;
            }
            if (!$this->pairRepository->isPairMutually($donor, $donee)) {
                break;
            }
        } while (true);

        if (!is_null($donee)) {
            return $donee;
        }

        return  $this->nextResolver->resolve($donor);
    }
}
