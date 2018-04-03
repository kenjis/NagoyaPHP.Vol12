<?php
namespace NagoyaPhp\Vol12;

use PHPUnit\Framework\TestCase;

class Vol12Test extends TestCase
{
    /**
     * @var Vol12
     */
    protected $skeleton;

    protected function setUp()
    {
        parent::setUp();
        $this->skeleton = new Vol12;
    }

    public function testNew()
    {
        $actual = $this->skeleton;
        $this->assertInstanceOf('\NagoyaPhp\Vol12\Vol12', $actual);
    }
}
