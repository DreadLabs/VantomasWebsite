<?php
namespace DreadLabs\VantomasWebsite\RssFeed;

use DreadLabs\VantomasWebsite\Page\PageIdCollectionInterface;
use DreadLabs\VantomasWebsite\Page\PageTypeCollectionInterface;

interface ConfigurationInterface
{

    /**
     * @return PageTypeCollectionInterface
     */
    public function getPageTypes();

    /**
     * @return string
     */
    public function getOrderBy();

    /**
     * @return string
     */
    public function getOrderDirection();
}
