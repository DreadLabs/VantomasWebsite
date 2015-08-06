<?php

/*
 * This file is part of the VantomasWebsite package.
 *
 * (c) Thomas Juhnke <dev@van-tomas.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DreadLabs\VantomasWebsite\Disqus\Response;

/**
 * Abstract resource response
 *
 * Orchestrates content validation, delivery and error information retrieval.
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
abstract class AbstractResponse
{

    /**
     * @var \stdClass
     */
    protected $content = null;

    /**
     * sets the content property
     *
     * Implement the necessary logic of the specific response format here.
     *
     * @param string $content
     *
     * @return void
     */
    abstract public function setContent($content);

    /**
     * validates and returns the content property
     *
     * @return \stdClass
     */
    final public function getContent()
    {
        $this->validateContent();

        return $this->content;
    }

    /**
     * validates the content by checking if an error exists in the API response
     *
     * @return void
     *
     * @throws Exception if validation went wrong, e.g. an error was detected in the response
     */
    final protected function validateContent()
    {
        if ($this->hasError()) {
            throw new Exception($this->getErrorMessage(), $this->getErrorCode());
        }
    }

    /**
     * flags if the response contains an error property which is not 0
     *
     * @return bool
     */
    protected function hasError()
    {
        return $this->getErrorCode() !== 0;
    }

    /**
     * returns the response error code
     *
     * @return int
     */
    protected function getErrorCode()
    {
        $content = $this->content;
        return is_object($content) && property_exists($content, 'code') ? (integer) $content->code : 0;
    }

    /**
     * returns the response message if an error was in the response
     *
     * @return string
     */
    protected function getErrorMessage()
    {
        return $this->hasError() ? $this->content->response : '';
    }
}
