<?php
namespace DreadLabs\VantomasWebsite\Page;

use Traversable;

class PageTypeCollection implements PageTypeCollectionInterface
{

    /**
     * @var array
     */
    private $pageTypes;

    /**
     * Retrieve the iterator for PageTypes
     *
     * @return Traversable An instance of an object implementing Iterator or Traversable
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->pageTypes);
    }

    /**
     * Whether an offset exists
     *
     * @param mixed $offset An offset to check for.
     * @return boolean true on success or false on failure.
     */
    public function offsetExists($offset)
    {
        return isset($this->pageTypes[$offset]);
    }

    /**
     * Offset to retrieve
     *
     * @param mixed $offset The offset to retrieve.
     * @return PageType
     */
    public function offsetGet($offset)
    {
        return $this->pageTypes[$offset];
    }

    /**
     * Offset to set
     *
     * @param mixed $offset The offset to assign the value to.
     * @param mixed $value The value to set.
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        if (!isset($offset)) {
            $this->pageTypes[] = $value;
        } else {
            $this->pageTypes[$offset] = $value;
        }
    }

    /**
     * Offset to unset
     *
     * @param mixed $offset The offset to unset.
     * @return void
     */
    public function offsetUnset($offset)
    {
        if ($offset instanceof PageType) {
            $this->pageTypes = array_filter($this->pageTypes, function ($pageType) use ($offset) {
                return $pageType !== $offset;
            });
        } else {
            unset($this->pageTypes[$offset]);
        }
    }

    /**
     * @param PageType $pageType
     * @return void
     */
    public function add(PageType $pageType)
    {
        $this->offsetSet(null, $pageType);
    }

    /**
     * @param PageType $pageType
     * @return void
     */
    public function remove(PageType $pageType)
    {
        $this->offsetUnset($pageType);
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return $this->pageTypes;
    }

    /**
     * Count elements of an object
     *
     * @return int The custom count as an integer.
     */
    public function count()
    {
        return count($this->pageTypes);
    }
}
