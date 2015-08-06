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

/**
 * Disqus API entry point
 *
 * Configuration, Client and Resource resolves to a response.
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
class Api implements ApiInterface
{

    /**
     * @var ConfigurationInterface
     */
    private $configuration;

    /**
     * @var ClientInterface
     */
    private $client;

    /**
     * @var ResourceInterface
     */
    private $resource;

    /**
     * @param ConfigurationInterface $configuration
     * @param ClientInterface $client
     * @param ResourceInterface $resource
     */
    public function __construct(
        ConfigurationInterface $configuration,
        ClientInterface $client,
        ResourceInterface $resource
    ) {
        $this->configuration = $configuration;
        $this->client = $client;
        $this->resource = $resource;
    }

    /**
     * {@inheritdoc}
     */
    public function connectWith($clientName)
    {
        $this->client->connectWith($clientName);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function execute($resourceSignature)
    {
        $this->resource->setBaseUrl($this->configuration->getBaseUrl());
        $this->resource->setResourceSignature($resourceSignature);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function with(array $parameters)
    {
        $parameters['apiKey'] = $this->configuration->getApiKey();

        $this->resource->setParameters($parameters);

        $response = $this->client
            ->connectTo($this->resource)
            ->send()
            ->disconnect()
            ->getResponse();

        return $response;
    }
}
