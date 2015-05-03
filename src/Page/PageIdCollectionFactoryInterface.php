<?php
namespace DreadLabs\VantomasWebsite\Page;

interface PageIdCollectionFactoryInterface
{

    /**
     * @param array $ids
     * @return PageIdCollectionInterface
     */
    public function createFromArray(array $ids);
}
