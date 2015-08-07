<?php

/*
 * This file is part of the VantomasWebsite package.
 *
 * (c) Thomas Juhnke <dev@van-tomas.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DreadLabs\VantomasWebsite\Taxonomy;

use Traversable;

/**
 * TagCloud
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
class TagCloud implements TagCloudInterface
{

    /**
     * @var array
     */
    private $tags;

    /**
     * @var \Arg\Tagcloud\Tagcloud
     */
    private $tagCloud;

    /**
     * @param \Arg\Tagcloud\Tagcloud $tagCloud
     */
    public function __construct(\Arg\Tagcloud\Tagcloud $tagCloud)
    {
        $this->tagCloud = $tagCloud;
        $this->tagCloud->setOrder('size', 'DESC');
        $this->tagCloud->setLimit(25);
    }

    /**
     * Retrieve an external iterator
     *
     * @return Traversable
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->toArray());
    }

    /**
     * Whether a offset exists
     *
     * The return value will be casted to boolean if non-boolean was returned.
     *
     * @param mixed $offset
     *
     * @return boolean true on success or false on failure.
     */
    public function offsetExists($offset)
    {
        return isset($this->tags[$offset]);
    }

    /**
     * Offset to retrieve
     *
     * @param mixed $offset
     *
     * @return mixed Can return all value types.
     */
    public function offsetGet($offset)
    {
        return $this->tags[$offset];
    }

    /**
     * Offset to set
     *
     * @param mixed $offset
     * @param string $value
     *
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        if (!isset($offset)) {
            $this->tags[] = $value;
        } else {
            $this->tags[$offset] = $value;
        }
    }

    /**
     * Offset to unset
     *
     * @param Tag $offset
     *
     * @return void
     */
    public function offsetUnset($offset)
    {
        $this->tags = array_filter($this->tags, function ($v) use ($offset) {
            return $v !== $offset->getValue();
        });
    }

    /**
     * Count elements of an object
     *
     * The return value is cast to an integer.
     *
     * @return int
     */
    public function count()
    {
        return count($this->tags);
    }

    /**
     * @param Tag $tag
     *
     * @return void
     */
    public function add(Tag $tag)
    {
        $this->offsetSet(null, $tag->getValue());
    }

    /**
     * @param Tag $tag
     *
     * @return void
     */
    public function remove(Tag $tag)
    {
        $this->offsetUnset($tag);
    }

    /**
     * @return Tag[]
     */
    public function toArray()
    {
        $tagCollection = array();

        $this->tagCloud->addTags($this->tags);
        $tags = $this->tagCloud->render('array');

        foreach ($tags as $tagAttributes) {
            if (!isset($tagAttributes['tag'])) {
                continue;
            }

            $tagCollection[] = Tag::fromString($tagAttributes['tag']);
        }

        return $tagCollection;
    }
}
