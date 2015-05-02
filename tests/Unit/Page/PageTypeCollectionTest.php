<?php
namespace DreadLabs\VantomasWebsite\Tests\Unit\Page;

use DreadLabs\VantomasWebsite\Page\PageType;
use DreadLabs\VantomasWebsite\Page\PageTypeCollection;

class PageTypeCollectionTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var PageTypeCollection
     */
    protected $sut;

    public function setUp()
    {
        $this->sut = new PageTypeCollection();
    }

    public function testAddPageType()
    {
        $pageType = PageType::fromString(1);
        $this->sut->add($pageType);

        $this->assertTrue(isset($this->sut[0]));
        $this->assertEquals($pageType, $this->sut[0]);
    }

    public function testRemovePageType()
    {
        $pageType = PageType::fromString(2);
        $this->sut->add($pageType);
        unset($this->sut[$pageType]);
        $this->assertFalse(isset($this->sut[1]));

        unset($this->sut[0]);
        $this->assertFalse(isset($this->sut[0]));
    }

    public function testMixedAccessors()
    {
        $pageType = PageType::fromString(3);
        $this->sut[0] = $pageType;
        $this->sut->remove($pageType);

        $this->assertFalse(isset($this->sut[0]));
    }

    public function testCounting()
    {
        $pageType1 = PageType::fromString(4);
        $this->sut->add($pageType1);
        $pageType2 = PageType::fromString(5);
        $this->sut->add($pageType2);

        $this->assertEquals(2, $this->sut->count());
    }

    public function testArrayIteratorUsage()
    {
        $pageType = PageType::fromString(6);
        $this->sut->add($pageType);
        $iterator = $this->sut->getIterator();

        $this->isInstanceOf('ArrayIterator', $iterator);
    }

    public function testArrayCasting()
    {
        $pageType1 = PageType::fromString(7);
        $this->sut->add($pageType1);
        $pageType2 = PageType::fromString(8);
        $this->sut->add($pageType2);

        $expected = array(
            $pageType1,
            $pageType2,
        );

        $this->assertSame($expected, $this->sut->toArray());
    }
}
