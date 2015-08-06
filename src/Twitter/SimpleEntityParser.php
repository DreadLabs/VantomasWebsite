<?php

/*
 * This file is part of the VantomasWebsite package.
 *
 * (c) Thomas Juhnke <dev@van-tomas.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DreadLabs\VantomasWebsite\Twitter;

/**
 * SimpleEntityParser
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
class SimpleEntityParser implements EntityParserInterface
{

    /**
     * @var \stdClass
     */
    private $entities;

    /**
     * @param \stdClass $entities
     *
     * @return void
     */
    public function setEntities(\stdClass $entities)
    {
        $this->entities = $entities;
    }

    /**
     * @param string $tweet
     *
     * @return string
     */
    public function parseUrls($tweet)
    {
        foreach ($this->entities->urls as $url) {
            $tweet = $this->replaceEntityInTweet(
                $tweet,
                $url->url,
                '<a href="' . $url->url . '">' . $url->url . '</a>'
            );
        }

        return $tweet;
    }

    /**
     * Replaces an entity in a tweet
     *
     * @param string $tweet
     * @param string $entity
     * @param string $replacement
     *
     * @return string
     */
    private function replaceEntityInTweet($tweet, $entity, $replacement)
    {
        return str_replace($entity, $replacement, $tweet);
    }

    /**
     * @param string $tweet
     *
     * @return string
     */
    public function parseHashTags($tweet)
    {
        foreach ($this->entities->hashtags as $hashTag) {
            $tweet = $this->replaceEntityInTweet(
                $tweet,
                '#' . $hashTag->text,
                '<a href="https://twitter.com/search?q=%23' . $hashTag->text . '&src=hash">#' . $hashTag->text . '</a>'
            );
        }

        return $tweet;
    }
}
