<?php

/*
 * This file is part of the VantomasWebsite package.
 *
 * (c) Thomas Juhnke <dev@van-tomas.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DreadLabs\VantomasWebsite\TeaserImage;

/**
 * ResourceInterface
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
class Resource
{

    /**
     * @var string
     */
    private $value;

    private function __construct()
    {
    }

    /**
     * @param string $publicUrl
     *
     * @return self
     *
     * @throws \InvalidArgumentException
     */
    public static function createFromPublicUrl($publicUrl)
    {
        if (!is_string($publicUrl) || empty(trim($publicUrl))) {
            throw new \InvalidArgumentException(
                'The given public URL is no valid teaser image resource.',
                1453748046211
            );
        }

        $path = parse_url($publicUrl, PHP_URL_PATH);

        if (false === $path) {
            throw new \InvalidArgumentException(
                'The given public URL of the teaser image resource is malformed.',
                1453748765907
            );
        }

        $resource = new Resource;
        $resource->value = (string) $path;

        return $resource;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }
}
