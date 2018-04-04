<?php

namespace NagoyaPhp\Vol12\Fare;

class Infant extends Fare
{
    private $adult = false;

    protected function isFree()
    {
        if ($this->adult) {
            return true;
        }

        if ($this->pass) {
            return true;
        }

        return false;
    }

    protected function calcNormalFare()
    {
        return $this->calcHalf($this->adultNormalFare);
    }

    public function withAdult()
    {
        $this->adult = true;
    }
}
