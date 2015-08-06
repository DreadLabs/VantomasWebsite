<?php

/*
 * This file is part of the VantomasWebsite package.
 *
 * (c) Thomas Juhnke <dev@van-tomas.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DreadLabs\VantomasWebsite\Tests\Unit\Page;

use DreadLabs\VantomasWebsite\Page\PageType;
use DreadLabs\VantomasWebsite\Page\PageTypeCollection;
use DreadLabs\VantomasWebsite\Page\PageTypeCollectionFactory;
use DreadLabs\VantomasWebsite\Page\PageTypeCollectionFactoryInterface;
use DreadLabs\VantomasWebsite\Page\PageTypeCollectionInterface;

/**
 * PageTypeCollectionFactoryTest
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
class PageTypeCollectionFactoryTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var PageTypeCollectionInterface|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $collectionMock;

    /**
     * @var PageTypeCollectionFactoryInterface
     */
    protected $sut;

    public function setUp()
    {
        $this->collectionMock = $this->getMock(PageTypeCollection::class);
        $this->sut = new PageTypeCollectionFactory($this->collectionMock);
    }

    public function testCreationFromArray()
    {
        $pageTypes = array('34', 5, '99', 'c');

        $this->collectionMock->expects($this->at(0))->method('add')->with($this->equalTo(PageType::fromString('34')));
        $this->collectionMock->expects($this->at(1))->method('add')->with($this->equalTo(PageType::fromString(5)));
        $this->collectionMock->expects($this->at(2))->method('add')->with($this->equalTo(PageType::fromString('99')));
        $this->collectionMock->expects($this->at(3))->method('add')->with($this->equalTo(PageType::fromString('c')));

        $collection = $this->sut->createFromArray($pageTypes);

        $this->assertInstanceOf(PageTypeCollectionInterface::class, $collection);
    }
}
