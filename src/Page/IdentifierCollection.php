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
 * IdentifierCollection
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
class IdentifierCollection implements \Countable, \ArrayAccess, \IteratorAggregate
{

    /**
     * @var array
     */
    private $identifiers;

    /**
     * Retrieve the iterator for Identifiers
     *
     * @return Traversable An instance of an object implementing Iterator or Traversable
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->identifiers);
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
        return isset($this->identifiers[$offset]);
    }

    /**
     * Offset to retrieve
     *
     * @param mixed $offset The offset to retrieve.
     *
     * @return Identifier
     */
    public function offsetGet($offset)
    {
        return $this->identifiers[$offset];
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
            $this->identifiers[] = $value;

            return;
        }

        $this->identifiers[$offset] = $value;
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
        if ($offset instanceof Identifier) {
            $this->identifiers = array_filter($this->identifiers, function ($identifier) use ($offset) {
                return $identifier !== $offset;
            });

            return;
        }

        unset($this->identifiers[$offset]);
    }

    /**
     * @param Identifier $identifier
     *
     * @return void
     */
    public function add(Identifier $identifier)
    {
        $this->offsetSet(null, $identifier);
    }

    /**
     * @param Identifier $identifier
     *
     * @return void
     */
    public function remove(Identifier $identifier)
    {
        $this->offsetUnset($identifier);
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return $this->identifiers;
    }

    /**
     * Count elements of an object
     *
     * @return int The custom count as an integer.
     */
    public function count()
    {
        return count($this->identifiers);
    }
}
