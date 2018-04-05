<?php
namespace NagoyaPhp\Vol12;

use PHPUnit\Framework\TestCase;

class InputParserTest extends TestCase
{
    public function setUp()
    {
        $this->parser = new InputParser();
    }

    public function test_コロンの前が料金()
    {
        $input = '210:Cn,In,Iw,Ap,Iw';
        $result = $this->parser->parse($input);

        $this->assertSame(210, $result['fare']);
    }

    public function test_コロンの後が乗客の記号()
    {
        $input = '210:Cn,In,Iw,Ap,Iw';
        $result = $this->parser->parse($input);

        $this->assertSame(['Cn', 'In', 'Iw', 'Ap', 'Iw'], $result['passengers']);
    }
}
