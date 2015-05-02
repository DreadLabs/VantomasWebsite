<?php
namespace DreadLabs\VantomasWebsite\Tests\Unit\Taxonomy;

use Arg\Tagcloud\Tagcloud;
use DreadLabs\VantomasWebsite\Taxonomy\Tag;
use DreadLabs\VantomasWebsite\Taxonomy\TagCloudInterface;

class TagCloudTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var Tagcloud|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $concreteTagCloud;

    /**
     * @var TagCloudInterface
     */
    protected $sut;

    public function setUp()
    {
        $this->concreteTagCloud = $this->getMock('Arg\\Tagcloud\\Tagcloud');
    }

    public function testConstructorSetsDefaultsForOrderAndLimit()
    {
        $this->concreteTagCloud
            ->expects($this->once())
            ->method('setOrder')
            ->with(
                $this->equalTo('size'),
                $this->equalTo('DESC')
            );
        $this->concreteTagCloud
            ->expects($this->once())
            ->method('setLimit')
            ->with($this->equalTo(25));

        $this->sut = $this->getTagCloud();
    }

    private function getTagCloud()
    {
        return new \DreadLabs\VantomasWebsite\Taxonomy\TagCloud($this->concreteTagCloud);
    }

    public function testAddTag()
    {
        $tag = Tag::fromString('foo');
        $this->sut = $this->getTagCloud();
        $this->sut->add($tag);

        $this->assertTrue(isset($this->sut[0]));
    }

    public function testRemoveTag()
    {
        $tag = Tag::fromString('bar');
        $this->sut = $this->getTagCloud();
        $this->sut->add($tag);
        unset($this->sut[$tag]);

        $this->assertFalse(isset($this->sut[0]));
    }

    public function testMixedAccessors()
    {
        $tag = Tag::fromString('lorem');
        $this->sut = $this->getTagCloud();
        $this->sut[0] = $tag;
        $this->sut->remove($tag);
    }

    public function testCounting()
    {
        $tag = Tag::fromString('hello');
        $this->sut = $this->getTagCloud();
        $this->sut->add($tag);
        $tag = Tag::fromString('world');
        $this->sut->add($tag);
        $this->assertEquals(2, count($this->sut));
    }

    public function testArrayIteratorUsage()
    {
        $tag1 = Tag::fromString('one');
        $this->sut = $this->getTagCloud();
        $this->sut->add($tag1);
        $tag2 = Tag::fromString('two');
        $this->sut->add($tag2);

        $this->concreteTagCloud
            ->expects($this->once())
            ->method('addTags')
            ->with(
                array(
                    $tag1->getValue(),
                    $tag2->getValue(),
                )
            );
        $this->concreteTagCloud
            ->expects($this->once())
            ->method('render')
            ->with($this->equalTo('array'))
            ->will($this->returnValue(array()));

        $iterator = $this->sut->getIterator();

        $this->assertInstanceOf('ArrayIterator', $iterator);
    }

    public function testArrayCasting()
    {
        $tag1 = Tag::fromString('hello');
        $this->sut = $this->getTagCloud();
        $this->sut->add($tag1);
        $tag2 = Tag::fromString('world');
        $this->sut->add($tag2);

        $this->concreteTagCloud
            ->expects($this->once())
            ->method('addTags')
            ->with(
                $this->equalTo(
                    array(
                        $tag1->getValue(),
                        $tag2->getValue(),
                    )
                )
            );
        $this->concreteTagCloud
            ->expects($this->once())
            ->method('render')
            ->with($this->equalTo('array'))
            ->will(
                $this->returnValue(
                    array(
                        array(
                            'tag' => $tag1->getValue(),
                        ),
                        array(
                            'tag' => $tag2->getValue(),
                        )
                    )
                )
            );

        $actual = $this->sut->toArray();
        $expected = array(
            $tag1,
            $tag2
        );
        $this->assertEquals($expected, $actual);
    }
}
