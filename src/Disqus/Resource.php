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

use DreadLabs\VantomasWebsite\Disqus\Resource\AbstractResource;
use DreadLabs\VantomasWebsite\Disqus\Resource\ResolverInterface;

/**
 * Resource URL generator
 *
 * Uses the resource resolver in order to create a proper
 * URL, ready to request from the Disqus API.
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
class Resource implements ResourceInterface
{

    /**
     * @var ResolverInterface
     */
    private $resourceResolver;

    /**
     * @var string
     */
    protected $baseUrl = '';

    /**
     * @var string
     */
    protected $signature;

    /**
     * the topic of the resource, e.g. "Forums"
     *
     * @var string
     */
    protected $topic = '';

    /**
     * the action in the topic, e.g. "ListPosts"
     *
     * @var string
     */
    protected $action = '';

    /**
     * @var string
     */
    protected $format = '';

    /**
     * @var AbstractResource
     */
    protected $concreteResource;

    /**
     * @var array
     */
    protected $parameters = array();

    /**
     * @param ResolverInterface $resourceResolver
     */
    public function __construct(ResolverInterface $resourceResolver)
    {
        $this->resourceResolver = $resourceResolver;
    }

    /**
     * {@inheritdoc}
     */
    public function setBaseUrl($baseUrl)
    {
        $this->baseUrl = $baseUrl;
    }

    /**
     * {@inheritdoc}
     */
    public function setResourceSignature($resourceSignature)
    {
        $this->signature = $resourceSignature;

        $this->parseResourceSignature();
        $this->initializeConcreteResource();
    }

    /**
     * parses a resource signature
     *
     * The format must be something like foo/bar.json
     *
     * @return void
     */
    protected function parseResourceSignature()
    {
        list($topic, $actionAndFormat) = explode('/', $this->signature);
        list($action, $format) = explode('.', $actionAndFormat);

        $this->topic = ucfirst($topic);
        $this->action = ucfirst($action);
        $this->format = $format;
    }

    /**
     * initializes a concrete resource implementation
     *
     * @return void
     */
    protected function initializeConcreteResource()
    {
        $this->concreteResource = $this->resourceResolver->resolve($this->topic, $this->action);
    }

    /**
     * {@inheritdoc}
     */
    public function setParameters(array $parameters)
    {
        $this->parameters = $parameters;
    }

    /**
     * {@inheritdoc}
     */
    public function getUrl()
    {
        $path = $this->concreteResource->getPath($this->parameters);

        return $this->baseUrl . $this->signature . '?' . $path;
    }

    /**
     * {@inheritdoc}
     */
    public function getFormat()
    {
        return $this->format;
    }
}
