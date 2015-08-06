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

/**
 * PageIdCollectionFactory
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
class PageIdCollectionFactory implements PageIdCollectionFactoryInterface
{

    /**
     * @var PageIdCollectionInterface
     */
    private $collection;

    /**
     * @param PageIdCollectionInterface $pageIdCollection
     */
    public function __construct(PageIdCollectionInterface $pageIdCollection)
    {
        $this->collection = $pageIdCollection;
    }

    /**
     * @param array $ids
     *
     * @return PageIdCollectionInterface
     */
    public function createFromArray(array $ids)
    {
        foreach ($ids as $pageId) {
            $this->collection->add(PageId::fromString($pageId));
        }

        return $this->collection;
    }
}
