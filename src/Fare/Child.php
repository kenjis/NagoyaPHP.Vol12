<?php
namespace NagoyaPhp\Vol12\Fare;

class Child extends Fare
{
    protected function isFree()
    {
        if ($this->pass) {
            return true;
        }

        return false;
    }

    protected function calcRegularFare()
    {
        return $this->calcHalf($this->adultRegularFare);
    }
}
