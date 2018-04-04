<?php
namespace NagoyaPhp\Vol12\Fare;

use PHPUnit\Framework\TestCase;

class ChildTest extends TestCase
{
    public function test_210円の区間では通常の子供の料金は110円()
    {
        $fare = new Child(210);
        $this->assertEquals(110, $fare->calc());
    }

    public function test_200円の区間では通常の子供の料金は100円()
    {
        $fare = new Child(200);
        $this->assertEquals(100, $fare->calc());
    }

    public function test_定期券を持つ子供の料金は0円()
    {
        $fare = new Child(200);
        $fare->withPass();
        $this->assertEquals(0, $fare->calc());
    }

    public function test_福祉割引は通常料金の半額()
    {
        $fare = new Child(200);
        $fare->withWelfare();
        $this->assertEquals(50, $fare->calc());
    }

    public function test_福祉割引は通常料金の半額で10円未満切り上げ()
    {
        $fare = new Child(210);
        $fare->withWelfare();
        $this->assertEquals(60, $fare->calc());
    }
}
