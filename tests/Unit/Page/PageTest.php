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
use DreadLabs\VantomasWebsite\Page\Identifier;
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
        $identifierMock = $this->getIdentifierMock();
        $sut = new Page($identifierMock);

        $this->assertSame($identifierMock, $sut->getIdentifier());
    }

    protected function getIdentifierMock()
    {
        return $this->getMockBuilder(Identifier::class)->disableOriginalConstructor()->getMock();
    }

    public function testTitleAccessors()
    {
        $identifierMock = $this->getIdentifierMock();
        $sut = new Page($identifierMock);

        $title = 'Acme Inc.';
        $sut->setTitle($title);

        $this->assertSame($title, $sut->getTitle());
    }

    public function testLastUpdatedAtAccessors()
    {
        $identifierMock = $this->getIdentifierMock();
        $sut = new Page($identifierMock);

        $lastUpdatedAt = new \DateTime();
        $sut->setLastUpdatedAt($lastUpdatedAt);

        $this->assertSame($lastUpdatedAt, $sut->getLastUpdatedAt());
    }

    public function testAbstractAccessors()
    {
        $identifierMock = $this->getIdentifierMock();
        $sut = new Page($identifierMock);

        $abstract = 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut';
        $sut->setAbstract($abstract);

        $this->assertSame($abstract, $sut->getAbstract());
    }

    public function testSubTitleAccessors()
    {
        $identifierMock = $this->getIdentifierMock();
        $sut = new Page($identifierMock);

        $subTitle = 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr';
        $sut->setSubTitle($subTitle);

        $this->assertSame($subTitle, $sut->getSubTitle());
    }

    public function testKeywordsAccessors()
    {
        $identifierMock = $this->getIdentifierMock();
        $sut = new Page($identifierMock);

        $keywords = 'Lorem, ipsum, dolor, sit, amet';
        $sut->setKeywords($keywords);

        $this->assertSame($keywords, $sut->getKeywords());
    }

    public function testCreatedAtAccessors()
    {
        $identifierMock = $this->getIdentifierMock();
        $sut = new Page($identifierMock);

        $createdAt = new \DateTime();
        $sut->setCreatedAt($createdAt);

        $this->assertSame($createdAt, $sut->getCreatedAt());
    }

    public function testTeaserImageAccessors()
    {
        $identifierMock = $this->getIdentifierMock();
        $sut = new Page($identifierMock);

        $teaserImage = TeaserImage\Resource::createFromPublicUrl('/path/to/image.jpg');
        $sut->setTeaserImage($teaserImage);

        $this->assertSame($teaserImage, $sut->getTeaserImage());
    }
}
