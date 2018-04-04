<?php
namespace NagoyaPhp\Vol12\Fare;

use PHPUnit\Framework\TestCase;

class InfantTest extends TestCase
{
    public function test_大人の同行者のいる幼児は無料()
    {
        $fare = new Infant(210);
        $fare->withAdult();
        $this->assertEquals(0, $fare->calc());
    }

    public function test_無料にならなかった幼児の通常料金は大人の半額()
    {
        $fare = new Infant(200);
        $this->assertEquals(100, $fare->calc());
    }

    public function test_無料にならなかった幼児の通常料金は大人の半額で10円未満切り上げ()
    {
        $fare = new Infant(210);
        $this->assertEquals(110, $fare->calc());
    }

    public function test_福祉割引は通常料金の半額()
    {
        $fare = new Infant(200);
        $fare->withWelfare();
        $this->assertEquals(50, $fare->calc());
    }

    public function test_福祉割引は通常料金の半額で10円未満切り上げ()
    {
        $fare = new Infant(210);
        $fare->withWelfare();
        $this->assertEquals(60, $fare->calc());
    }
}
