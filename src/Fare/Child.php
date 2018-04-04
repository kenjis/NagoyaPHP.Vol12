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

    protected function calcNormalFare()
    {
        return $this->calcHalf($this->adultNormalFare);
    }
}
