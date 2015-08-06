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

use DreadLabs\VantomasWebsite\Page\PageId;
use DreadLabs\VantomasWebsite\Page\PageIdCollection;
use DreadLabs\VantomasWebsite\Page\PageIdCollectionFactory;
use DreadLabs\VantomasWebsite\Page\PageIdCollectionFactoryInterface;
use DreadLabs\VantomasWebsite\Page\PageIdCollectionInterface;

/**
 * PageIdCollectionFactoryTest
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
class PageIdCollectionFactoryTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var PageIdCollectionInterface|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $collectionMock;

    /**
     * @var PageIdCollectionFactoryInterface
     */
    protected $sut;

    public function setUp()
    {
        $this->collectionMock = $this->getMock(PageIdCollection::class);
        $this->sut = new PageIdCollectionFactory($this->collectionMock);
    }

    public function testCreationFromArray()
    {
        $pageIds = array('1', 2, '34', 'a');

        $this->collectionMock->expects($this->at(0))->method('add')->with($this->equalTo(PageId::fromString('1')));
        $this->collectionMock->expects($this->at(1))->method('add')->with($this->equalTo(PageId::fromString(2)));
        $this->collectionMock->expects($this->at(2))->method('add')->with($this->equalTo(PageId::fromString('34')));
        $this->collectionMock->expects($this->at(3))->method('add')->with($this->equalTo(PageId::fromString('a')));

        $collection = $this->sut->createFromArray($pageIds);

        $this->assertInstanceOf(PageIdCollectionInterface::class, $collection);
    }
}
