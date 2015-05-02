<?php
namespace DreadLabs\VantomasWebsite\Tests\Unit\Disqus\Response;

use DreadLabs\VantomasWebsite\Disqus\Response\Json;

class JsonTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var Json
     */
    protected $sut;

    public function setUp()
    {
        $this->sut = new Json();
    }

    public function testJsonResponseGetsDecoded()
    {
        $json = file_get_contents(__DIR__ . '/../../../Fixture/Disqus/DummyResponse.json');
        $this->sut->setContent($json);
        $content = $this->sut->getContent();

        $this->assertInstanceOf('stdClass', $content);
    }
}
