<?php

/*
 * This file is part of the VantomasWebsite package.
 *
 * (c) Thomas Juhnke <dev@van-tomas.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DreadLabs\VantomasWebsite\Page;

use Traversable;

/**
 * PageIdCollection
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
class PageIdCollection implements PageIdCollectionInterface
{

    /**
     * @var array
     */
    private $pageIds;

    /**
     * Retrieve the iterator for PageIds
     *
     * @return Traversable An instance of an object implementing Iterator or Traversable
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->pageIds);
    }

    /**
     * Whether an offset exists
     *
     * @param mixed $offset An offset to check for.
     *
     * @return boolean true on success or false on failure.
     */
    public function offsetExists($offset)
    {
        return isset($this->pageIds[$offset]);
    }

    /**
     * Offset to retrieve
     *
     * @param mixed $offset The offset to retrieve.
     *
     * @return PageId
     */
    public function offsetGet($offset)
    {
        return $this->pageIds[$offset];
    }

    /**
     * Offset to set
     *
     * @param mixed $offset The offset to assign the value to.
     * @param mixed $value The value to set.
     *
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        if (!isset($offset)) {
            $this->pageIds[] = $value;
        } else {
            $this->pageIds[$offset] = $value;
        }
    }

    /**
     * Offset to unset
     *
     * @param mixed $offset The offset to unset.
     *
     * @return void
     */
    public function offsetUnset($offset)
    {
        if ($offset instanceof PageId) {
            $this->pageIds = array_filter($this->pageIds, function ($pageId) use ($offset) {
                return $pageId !== $offset;
            });
        } else {
            unset($this->pageIds[$offset]);
        }
    }

    /**
     * @param PageId $pageId
     *
     * @return void
     */
    public function add(PageId $pageId)
    {
        $this->offsetSet(null, $pageId);
    }

    /**
     * @param PageId $pageId
     *
     * @return void
     */
    public function remove(PageId $pageId)
    {
        $this->offsetUnset($pageId);
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return $this->pageIds;
    }

    /**
     * Count elements of an object
     *
     * @return int The custom count as an integer.
     */
    public function count()
    {
        return count($this->pageIds);
    }
}
