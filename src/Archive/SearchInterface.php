<?php
namespace DreadLabs\VantomasWebsite\Archive;

use DreadLabs\VantomasWebsite\Page\PageType;

interface SearchInterface
{

    /**
     * @param DateRange $dateRange
     * @return void
     */
    public function setDateRange(DateRange $dateRange);

    /**
     * @param PageType $pageType
     * @return void
     */
    public function setPageType(PageType $pageType);

    /**
     * @return array
     */
    public function getCriteria();

    /**
     * List of arguments for a result list title generation.
     *
     * The result list title may contain placeholders for the
     * date range month / year values, parsed by sprintf() or
     * similar.
     *
     * @return array
     */
    public function getResultListTitleArguments();
}
