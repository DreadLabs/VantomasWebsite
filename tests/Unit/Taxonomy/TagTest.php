<?php
namespace DreadLabs\VantomasWebsite\Tests\Unit\Taxonomy;

use DreadLabs\VantomasWebsite\Taxonomy\Tag;

class TagTest extends \PHPUnit_Framework_TestCase
{

    public function testConstructionCastsToString()
    {
        $tag = new Tag(2);
        $this->assertEquals('2', $tag->getValue());

        $tag = new Tag('a');
        $this->assertEquals('a', $tag->getValue());

        $tag = new Tag('null');
        $this->assertEquals('null', $tag->getValue());

        $tag = new Tag(null);
        $this->assertEquals('', $tag->getValue());
    }

    public function testNamedConstructionFromStringCastsToString()
    {
        $tag = Tag::fromString('foo');
        $this->assertEquals('foo', $tag->getValue());

        $tag = Tag::fromString(null);
        $this->assertEquals('', $tag->getValue());
    }

    public function testNamedConstructionFromEncodedUrlString()
    {
        $tag = Tag::fromUrl('Hello+World');
        $this->assertEquals('Hello World', $tag->getValue());

        $tag = Tag::fromUrl('Hello%20World');
        $this->assertEquals('Hello World', $tag->getValue());
    }
}
