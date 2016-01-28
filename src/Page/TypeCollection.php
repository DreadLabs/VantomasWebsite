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
 * TypeCollection
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
class TypeCollection implements \Countable, \ArrayAccess, \IteratorAggregate
{

    /**
     * @var array
     */
    private $types;

    /**
     * Retrieve the iterator for Types
     *
     * @return Traversable An instance of an object implementing Iterator or Traversable
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->types);
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
        return isset($this->types[$offset]);
    }

    /**
     * Offset to retrieve
     *
     * @param mixed $offset The offset to retrieve.
     *
     * @return Type
     */
    public function offsetGet($offset)
    {
        return $this->types[$offset];
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
            $this->types[] = $value;

            return;
        }

        $this->types[$offset] = $value;
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
        if ($offset instanceof Type) {
            $this->types = array_filter($this->types, function ($type) use ($offset) {
                return $type !== $offset;
            });

            return;
        }

        unset($this->types[$offset]);
    }

    /**
     * @param Type $type
     *
     * @return void
     */
    public function add(Type $type)
    {
        $this->offsetSet(null, $type);
    }

    /**
     * @param Type $type
     *
     * @return void
     */
    public function remove(Type $type)
    {
        $this->offsetUnset($type);
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return $this->types;
    }

    /**
     * Count elements of an object
     *
     * @return int The custom count as an integer.
     */
    public function count()
    {
        return count($this->types);
    }
}
