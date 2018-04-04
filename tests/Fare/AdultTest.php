<?php
namespace NagoyaPhp\Vol12\Fare;

use PHPUnit\Framework\TestCase;

class AdultTest extends TestCase
{
    public function test_210円の区間では通常の大人の料金は210円()
    {
        $fare = new Adult(210);
        $this->assertEquals(210, $fare->calc());
    }

    public function test_200円の区間では通常の大人の料金は200円()
    {
        $fare = new Adult(200);
        $this->assertEquals(200, $fare->calc());
    }

    public function test_定期券を持つ大人の料金は0円()
    {
        $fare = new Adult(200);
        $fare->withPass();
        $this->assertEquals(0, $fare->calc());
    }

    public function test_福祉割引は通常料金の半額()
    {
        $fare = new Adult(200);
        $fare->withWelfare();
        $this->assertEquals(100, $fare->calc());
    }

    public function test_福祉割引は通常料金の半額で10円未満切り上げ()
    {
        $fare = new Adult(210);
        $fare->withWelfare();
        $this->assertEquals(110, $fare->calc());
    }
}
