<?php
namespace DreadLabs\VantomasWebsite\Page;

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
