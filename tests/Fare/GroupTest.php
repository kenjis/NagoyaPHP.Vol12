<?php
namespace NagoyaPhp\Vol12\Fare;

use PHPUnit\Framework\TestCase;

class GroupTest extends TestCase
{
    public function test_料金グループに大人200円1人の場合、料金は200円()
    {
        $adultNormalFare = 200;
        $adult = new Adult($adultNormalFare);
        $group = new Group();
        $group->add($adult);
        $this->assertSame(200, $group->calc());
    }

    public function test_料金グループに大人200円2人の場合、料金は400円()
    {
        $adultNormalFare = 200;
        $adult1 = new Adult($adultNormalFare);
        $adult2 = new Adult($adultNormalFare);
        $group = new Group();
        $group->add($adult1);
        $group->add($adult2);
        $this->assertSame(400, $group->calc());
    }

    public function test_幼児は同行者の大人1名につき2名まで無料()
    {
        $adultNormalFare = 200;
        $adult = new Adult($adultNormalFare);
        $infant1 = new Infant($adultNormalFare);
        $infant2 = new Infant($adultNormalFare);

        $group = new Group();
        $group->add($adult);
        $group->add($infant1);
        $group->add($infant2);

        $fare = $group->calc();

        $this->assertSame(200, $fare);
    }

    public function test_幼児3名と大人1名の場合、大人料金プラス幼児料金()
    {
        $adultNormalFare = 200;
        $adult = new Adult($adultNormalFare);
        $infant1 = new Infant($adultNormalFare);
        $infant2 = new Infant($adultNormalFare);
        $infant3 = new Infant($adultNormalFare);

        $group = new Group();
        $group->add($adult);
        $group->add($infant1);
        $group->add($infant2);
        $group->add($infant3);

        $fare = $group->calc();

        $this->assertSame(300, $fare);
    }

    public function test_大人定期券あり、子供通常、幼児通常、幼児福祉割引2人の場合、料金は170円()
    {
        $adultNormalFare = 210;
        $adult = new Adult($adultNormalFare);
        $adult->withPass();
        $child = new Child($adultNormalFare);
        $infant1 = new Infant($adultNormalFare);
        $infant2 = new Infant($adultNormalFare);
        $infant2->withWelfare();
        $infant3 = new Infant($adultNormalFare);
        $infant3->withWelfare();

        $group = new Group();
        $group->add($adult);
        $group->add($child);
        $group->add($infant2);
        $group->add($infant3);
        $group->add($infant1);

        $fare = $group->calc();

        $this->assertSame(170, $fare);
    }
}
