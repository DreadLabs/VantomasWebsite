<?php

/*
 * This file is part of the VantomasWebsite package.
 *
 * (c) Thomas Juhnke <dev@van-tomas.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DreadLabs\VantomasWebsite\Disqus\Resource;

/**
 * Abstract Disqus resource
 *
 * Sets essential parameters (API key) and provides the `getPath` method
 * to translate the concrete resource into a queryable URI.
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
abstract class AbstractResource
{

    /**
     * holds the API key
     *
     * @var string
     */
    protected $apiKey = '';

    /**
     * sets the API key
     *
     * @param string $apiKey
     *
     * @return void
     */
    public function setApiKey($apiKey)
    {
        $this->apiKey = $apiKey;
    }

    /**
     * returns the resource path which is usable by a client
     *
     * @param array $parameters
     *
     * @return string A API query string
     */
    public function getPath(array $parameters)
    {
        foreach ($parameters as $parameterName => $parameterValue) {
            $parameterMethod = 'set' . ucfirst($parameterName);

            $this->$parameterMethod($parameterValue);
        }

        return $this->buildPath();
    }

    /**
     * builds a API query string path
     *
     * @return string
     */
    protected function buildPath()
    {
        $urlParameters = array();

        $parameters = get_object_vars($this);

        foreach ($parameters as $parameterName => $parameterValue) {
            if (true === is_null($parameterValue)) {
                continue;
            }
            if ($parameterName === 'apiKey') {
                $parameterName = 'api_key';
            }

            $urlParameters[] = $this->getPathPartForParameter($parameterName, $parameterValue);
        }

        return implode('&', $urlParameters);
    }

    /**
     * Delegates to self::getPathParameter(), handles error
     *
     * If a parameter type cannot be converted to a proper path part, the
     * value is kept empty.
     *
     * @param string $parameterName
     * @param mixed $parameterValue
     *
     * @return string
     */
    protected function getPathPartForParameter($parameterName, $parameterValue)
    {
        try {
            $pathPart = $this->getPathParameter($parameterName, $parameterValue);
        } catch (\Exception $e) {
            $pathPart = $parameterName . '=';
        }

        return $pathPart;
    }

    /**
     * gets a parameter/value pair for usage in a URL query string
     *
     * @param string $parameterName
     * @param mixed $parameterValue
     *
     * @return string
     *
     * @throws \Exception If the given parameterValue cannot be converted for the path
     */
    protected function getPathParameter($parameterName, $parameterValue)
    {
        if (true === is_scalar($parameterValue)) {
            return $this->getScalarPathParameter($parameterName, $parameterValue);
        } elseif (true === is_array($parameterValue)) {
            return $this->getArrayPathParameter($parameterName, $parameterValue);
        }

        throw new \Exception(
            sprintf(
                'The setting of parameter %s (%s) is currently not supported!',
                $parameterName,
                gettype($parameterValue)
            ),
            1367354994
        );
    }

    /**
     * builds a scalar parameter/value pair
     *
     * @param string $parameterName
     * @param string $parameterValue
     *
     * @return string
     */
    protected function getScalarPathParameter($parameterName, $parameterValue)
    {
        return $parameterName . '=' . $parameterValue;
    }

    /**
     * iterates over an array parameter value
     *
     * @param string $parameterName
     * @param array $parameterValue
     *
     * @return string
     */
    protected function getArrayPathParameter($parameterName, array $parameterValue)
    {
        $urlParameter = array();

        foreach ($parameterValue as $parameterValueValue) {
            $urlParameter[] = $this->getPathParameter($parameterName, $parameterValueValue);
        }

        return implode('&', $urlParameter);
    }
}
