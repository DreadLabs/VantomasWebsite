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

use DreadLabs\VantomasWebsite\Archive\SearchInterface;
use DreadLabs\VantomasWebsite\RssFeed\ConfigurationInterface as RssFeedConfigurationInterface;
use DreadLabs\VantomasWebsite\Sitemap\ConfigurationInterface as SitemapConfiguration;
use DreadLabs\VantomasWebsite\Taxonomy\Tag;

/**
 * PageRepositoryInterface
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
interface PageRepositoryInterface
{

    /**
     * Searches for archived (page) nodes by given criteria
     *
     * @param SearchInterface $search
     *
     * @return Page[]
     */
    public function findArchived(SearchInterface $search);

    /**
     * Finds last updated pages of type $pageType
     *
     * @param PageType $pageType
     * @param int $offset
     * @param int $limit
     *
     * @return Page[]
     */
    public function findLastUpdated(PageType $pageType, $offset = 0, $limit = 1);

    /**
     * Finds all pages with tags
     *
     * @return Page[]
     */
    public function findAllWithTags();

    /**
     * @param Tag $tag
     *
     * @return Page[]
     */
    public function findAllByTag(Tag $tag);

    /**
     * @param SitemapConfiguration $configuration
     *
     * @return Page[]
     */
    public function findForSitemapXml(SitemapConfiguration $configuration);


    /**
     * @param RssFeedConfigurationInterface $configuration
     *
     * @return Page[]
     */
    public function findAllForRssFeed(RssFeedConfigurationInterface $configuration);
}
