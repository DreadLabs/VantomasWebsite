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

use DreadLabs\VantomasWebsite\Disqus\Response\AbstractResponse;
use DreadLabs\VantomasWebsite\Disqus\Response\ResolverInterface;

/**
 * Response
 *
 * Mediates response object resolving and content retrieval.
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
class Response implements ResponseInterface
{

    /**
     * @var ResolverInterface
     */
    private $responseResolver;

    /**
     * the current response format (e.g. json or rss)
     *
     * @var string
     */
    protected $format = '';

    /**
     * instance of a concrete response
     *
     * @var AbstractResponse
     */
    protected $concreteResponse;

    /**
     * @param ResolverInterface $responseResolver
     */
    public function __construct(ResolverInterface $responseResolver)
    {
        $this->responseResolver = $responseResolver;
    }

    /**
     * {@inheritdoc}
     */
    public function setFormat($format)
    {
        $this->format = $format;

        $this->concreteResponse = $this->responseResolver->resolve($format);
    }

    /**
     * {@inheritdoc}
     */
    public function setContent($content)
    {
        $this->concreteResponse->setContent($content);
    }

    /**
     * {@inheritdoc}
     */
    public function getContent()
    {
        return $this->concreteResponse->getContent();
    }
}
