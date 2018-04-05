<?php
namespace NagoyaPhp\Vol12\Fare;

use PHPUnit\Framework\TestCase;

class FactoryTest extends TestCase
{
    public function test_Aは大人、nは通常料金()
    {
        $adultNormalFare = 210;
        $passenager = 'An';
        $factory = new Factory();
        $fare = $factory->createFare($adultNormalFare, $passenager);

        $this->assertInstanceOf(Adult::class, $fare);
        $this->assertSame(210, $fare->calc());
    }

    public function test_Aは大人、pは定期あり()
    {
        $adultNormalFare = 210;
        $passenager = 'Ap';
        $factory = new Factory();
        $fare = $factory->createFare($adultNormalFare, $passenager);

        $this->assertInstanceOf(Adult::class, $fare);
        $this->assertSame(0, $fare->calc());
    }

    public function test_Cは子供、nは通常料金()
    {
        $adultNormalFare = 210;
        $passenager = 'Cn';
        $factory = new Factory();
        $fare = $factory->createFare($adultNormalFare, $passenager);

        $this->assertInstanceOf(Child::class, $fare);
        $this->assertSame(110, $fare->calc());
    }

    public function test_Cは子供、wは福祉割引()
    {
        $adultNormalFare = 210;
        $passenager = 'Cw';
        $factory = new Factory();
        $fare = $factory->createFare($adultNormalFare, $passenager);

        $this->assertInstanceOf(Child::class, $fare);
        $this->assertSame(60, $fare->calc());
    }

    /**
     * @expectedException \RuntimeException
     * @expectedExceptionMessage 年齢区分が存在しません
     */
    public function test_存在しない年齢区分の場合は例外が発生する()
    {
        $adultNormalFare = 210;
        $passenager = 'Xw';
        $factory = new Factory();
        $factory->createFare($adultNormalFare, $passenager);
    }

    /**
     * @expectedException \RuntimeException
     * @expectedExceptionMessage 料金区分が存在しません
     */
    public function test_存在しない料金区分の場合は例外が発生する()
    {
        $adultNormalFare = 210;
        $passenager = 'Ax';
        $factory = new Factory();
        $factory->createFare($adultNormalFare, $passenager);
    }

    public function test_Iは幼児、nは通常料金()
    {
        $adultNormalFare = 210;
        $passenager = 'In';
        $factory = new Factory();
        $fare = $factory->createFare($adultNormalFare, $passenager);

        $this->assertInstanceOf(Infant::class, $fare);
        $this->assertSame(110, $fare->calc());
    }

    public function test_複数の乗客から料金グループが生成される()
    {
        $adultNormalFare = 210;
        $passenagers = ['An', 'In'];
        $factory = new Factory();
        $group = $factory->create($adultNormalFare, $passenagers);

        $this->assertInstanceOf(Group::class, $group);
    }
}
