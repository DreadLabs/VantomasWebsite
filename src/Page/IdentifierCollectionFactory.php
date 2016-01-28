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
 * IdentifierCollectionFactory
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
class IdentifierCollectionFactory
{

    /**
     * @var IdentifierCollection
     */
    private $collection;

    /**
     * @param IdentifierCollection $collection
     */
    public function __construct(IdentifierCollection $collection)
    {
        $this->collection = $collection;
    }

    /**
     * @param array $identifiers
     *
     * @return IdentifierCollection
     */
    public function createFromArray(array $identifiers)
    {
        foreach ($identifiers as $identifier) {
            $this->collection->add(Identifier::fromString($identifier));
        }

        return $this->collection;
    }
}
