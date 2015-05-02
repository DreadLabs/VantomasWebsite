<?php
namespace DreadLabs\VantomasWebsite\Tests\Unit\Page;

use DreadLabs\VantomasWebsite\Page\PageId;
use DreadLabs\VantomasWebsite\Page\PageIdCollection;

class PageIdCollectionTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var PageIdCollection
     */
    protected $sut;

    public function setUp()
    {
        $this->sut = new PageIdCollection();
    }

    public function testAddPageId()
    {
        $pageId = PageId::fromString(1);
        $this->sut->add($pageId);

        $this->assertTrue(isset($this->sut[0]));
        $this->assertEquals($pageId, $this->sut[0]);
    }

    public function testRemovePageId()
    {
        $pageId = PageId::fromString(2);
        $this->sut->add($pageId);
        unset($this->sut[$pageId]);
        $this->assertFalse(isset($this->sut[1]));

        unset($this->sut[0]);
        $this->assertFalse(isset($this->sut[0]));
    }

    public function testMixedAccessors()
    {
        $pageId = PageId::fromString(3);
        $this->sut[0] = $pageId;
        $this->sut->remove($pageId);

        $this->assertFalse(isset($this->sut[0]));
    }

    public function testCounting()
    {
        $pageId1 = PageId::fromString(4);
        $this->sut->add($pageId1);
        $pageId2 = PageId::fromString(5);
        $this->sut->add($pageId2);

        $this->assertEquals(2, $this->sut->count());
    }

    public function testArrayIteratorUsage()
    {
        $pageId = PageId::fromString(6);
        $this->sut->add($pageId);
        $iterator = $this->sut->getIterator();

        $this->isInstanceOf('ArrayIterator', $iterator);
    }

    public function testArrayCasting()
    {
        $pageId1 = PageId::fromString(7);
        $this->sut->add($pageId1);
        $pageId2 = PageId::fromString(8);
        $this->sut->add($pageId2);

        $expected = array(
            $pageId1,
            $pageId2,
        );

        $this->assertSame($expected, $this->sut->toArray());
    }
}
