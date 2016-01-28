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
 * TypeCollectionFactory
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
class TypeCollectionFactory
{

    /**
     * @var TypeCollection
     */
    private $collection;

    /**
     * @param TypeCollection $collection
     */
    public function __construct(TypeCollection $collection)
    {
        $this->collection = $collection;
    }

    /**
     * @param array $types
     *
     * @return TypeCollection
     */
    public function createFromArray(array $types)
    {
        foreach ($types as $type) {
            $this->collection->add(Type::fromString($type));
        }

        return $this->collection;
    }
}
