<?php
namespace DreadLabs\VantomasWebsite\SecretSanta\Donee\ResolverHandler;

use DreadLabs\VantomasWebsite\SecretSanta\Donee\ResolverHandlerInterface;

/**
 * FactoryInterface
 */
interface FactoryInterface
{

    /**
     * Creates a ResolverHandler by given $name
     *
     * @param string $handlerName Name of the resolver handler to create
     * @param ResolverHandlerInterface $nextHandler Next handler for the resolver
     *
     * @return ResolverHandlerInterface
     */
    public function create($handlerName, ResolverHandlerInterface $nextHandler = null);
}
