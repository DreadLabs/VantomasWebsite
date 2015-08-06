<?php

/*
 * This file is part of the VantomasWebsite package.
 *
 * (c) Thomas Juhnke <dev@van-tomas.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DreadLabs\VantomasWebsite\Disqus;

use DreadLabs\VantomasWebsite\Disqus\Client\AbstractClient;
use DreadLabs\VantomasWebsite\Disqus\Client\ResolverInterface;

/**
 * Client entry point
 *
 * Uses the resolver to find a proper client implementation.
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
class Client implements ClientInterface
{

    /**
     * the client name of a concrete client class in this extension
     *
     * @var string
     */
    protected $clientName = 'Curl';

    /**
     * @var ResolverInterface
     */
    protected $clientResolver;

    /**
     * @var AbstractClient
     */
    protected $concreteClient;

    /**
     * @var ResponseInterface
     */
    protected $response;

    /**
     * @param ResolverInterface $clientResolver
     */
    public function __construct(
        ResolverInterface $clientResolver
    ) {
        $this->clientResolver = $clientResolver;
    }

    /**
     * {@inheritdoc}
     */
    public function connectWith($clientName)
    {
        $this->concreteClient = $this->clientResolver->resolve($clientName);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function connectTo(ResourceInterface $resource)
    {
        $this->concreteClient->connectTo($resource);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function send()
    {
        $this->response = $this->concreteClient->getResponse();

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function disconnect()
    {
        $this->concreteClient->disconnect();

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getResponse()
    {
        return $this->response;
    }
}
