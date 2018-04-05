<?php
namespace NagoyaPhp\Vol12\Fare;

use NagoyaPhp\Vol12\Exception\RuntimeException;

class Factory
{
    public function create($adultNormalfare, array $passengers)
    {
        $group = new Group();

        foreach ($passengers as $passenger) {
            $fare = $this->createFare($adultNormalfare, $passenger);
            $group->add($fare);
        }

        return $group;
    }

    public function createFare($adultNormalfare, $passenger)
    {
        $age = $passenger[0];
        $discount = $passenger[1];

        switch ($age) {
            case 'A':
                $fare = new Adult($adultNormalfare);
                break;
            case 'C':
                $fare = new Child($adultNormalfare);
                break;
            case 'I':
                $fare = new Infant($adultNormalfare);
                break;
            default:
                throw new RuntimeException('年齢区分が存在しません。');
        }

        switch ($discount) {
            case 'n':
                break;
            case 'p':
                $fare->withPass();
                break;
            case 'w':
                $fare->withWelfare();
                break;
            default:
                throw new RuntimeException('料金区分が存在しません。');
        }

        return $fare;
    }
}
