<?php
namespace DreadLabs\VantomasWebsite\Page;

interface PageTypeCollectionFactoryInterface
{

    /**
     * @param array $types
     * @return PageTypeCollectionInterface
     */
    public function createFromArray(array $types);
}
