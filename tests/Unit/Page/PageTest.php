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

use DreadLabs\VantomasWebsite\Page\Page;
use DreadLabs\VantomasWebsite\Page\PageId;
use DreadLabs\VantomasWebsite\TeaserImage;

/**
 * PageTest
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
class PageTest extends \PHPUnit_Framework_TestCase
{

    public function testConstruction()
    {
        $pageIdMock = $this->getPageIdMock();
        $sut = new Page($pageIdMock);

        $this->assertSame($pageIdMock, $sut->getId());
    }

    protected function getPageIdMock()
    {
        return $this->getMockBuilder(PageId::class)->disableOriginalConstructor()->getMock();
    }

    public function testTitleAccessors()
    {
        $pageIdMock = $this->getPageIdMock();
        $sut = new Page($pageIdMock);

        $title = 'Acme Inc.';
        $sut->setTitle($title);

        $this->assertSame($title, $sut->getTitle());
    }

    public function testLastUpdatedAtAccessors()
    {
        $pageIdMock = $this->getPageIdMock();
        $sut = new Page($pageIdMock);

        $lastUpdatedAt = new \DateTime();
        $sut->setLastUpdatedAt($lastUpdatedAt);

        $this->assertSame($lastUpdatedAt, $sut->getLastUpdatedAt());
    }

    public function testAbstractAccessors()
    {
        $pageIdMock = $this->getPageIdMock();
        $sut = new Page($pageIdMock);

        $abstract = 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut';
        $sut->setAbstract($abstract);

        $this->assertSame($abstract, $sut->getAbstract());
    }

    public function testSubTitleAccessors()
    {
        $pageIdMock = $this->getPageIdMock();
        $sut = new Page($pageIdMock);

        $subTitle = 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr';
        $sut->setSubTitle($subTitle);

        $this->assertSame($subTitle, $sut->getSubTitle());
    }

    public function testKeywordsAccessors()
    {
        $pageIdMock = $this->getPageIdMock();
        $sut = new Page($pageIdMock);

        $keywords = 'Lorem, ipsum, dolor, sit, amet';
        $sut->setKeywords($keywords);

        $this->assertSame($keywords, $sut->getKeywords());
    }

    public function testCreatedAtAccessors()
    {
        $pageIdMock = $this->getPageIdMock();
        $sut = new Page($pageIdMock);

        $createdAt = new \DateTime();
        $sut->setCreatedAt($createdAt);

        $this->assertSame($createdAt, $sut->getCreatedAt());
    }

    public function testTeaserImageAccessors()
    {
        $pageIdMock = $this->getPageIdMock();
        $sut = new Page($pageIdMock);

        $teaserImage = TeaserImage\Resource::createFromPublicUrl('/path/to/image.jpg');
        $sut->setTeaserImage($teaserImage);

        $this->assertSame($teaserImage, $sut->getTeaserImage());
    }
}
