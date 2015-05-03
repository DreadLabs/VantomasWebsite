<?php
namespace DreadLabs\VantomasWebsite\Page;

class PageTypeCollectionFactory implements PageTypeCollectionFactoryInterface
{

    /**
     * @var PageTypeCollection
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
