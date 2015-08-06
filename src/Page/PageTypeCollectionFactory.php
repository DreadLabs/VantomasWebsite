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
 * PageTypeCollectionFactory
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
class PageTypeCollectionFactory implements PageTypeCollectionFactoryInterface
{

    /**
     * @var PageTypeCollectionInterface
     */
    private $collection;

    /**
     * @param PageTypeCollectionInterface $pageTypeCollection
     */
    public function __construct(PageTypeCollectionInterface $pageTypeCollection)
    {
        $this->collection = $pageTypeCollection;
    }

    /**
     * @param array $types
     *
     * @return PageTypeCollectionInterface
     */
    public function createFromArray(array $types)
    {
        foreach ($types as $pageType) {
            $this->collection->add(PageType::fromString($pageType));
        }

        return $this->collection;
    }
}
