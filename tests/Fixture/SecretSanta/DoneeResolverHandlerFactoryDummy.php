<?php
namespace DreadLabs\VantomasWebsite\Tests\Fixture\SecretSanta;

use DreadLabs\VantomasWebsite\SecretSanta\Donee\ResolverHandler\FactoryInterface;
use DreadLabs\VantomasWebsite\SecretSanta\Donee\ResolverHandlerInterface;

class DoneeResolverHandlerFactoryDummy implements FactoryInterface
{

    /**
     * Creates a ResolverHandler by given $name
     *
     * @param string $handlerName Name of the resolver handler to create
     * @param ResolverHandlerInterface $nextHandler Next handler for the resolver
     *
     * @return ResolverHandlerInterface
     */
    public function create($handlerName, ResolverHandlerInterface $nextHandler = null)
    {
        // TODO: Implement create() method.
    }
}