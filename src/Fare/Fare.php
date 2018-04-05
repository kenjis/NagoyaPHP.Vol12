<?php
namespace NagoyaPhp\Vol12\Fare;

abstract class Fare
{
    protected $adultNormalFare;
    protected $pass = false;
    protected $welfare = false;

    public function __construct($adultNormalFare)
    {
        $this->adultNormalFare = $adultNormalFare;
    }

    public function calc()
    {
        if ($this->isFree()) {
            return 0;
        }

        $normalFare = (int) $this->calcNormalFare();

        if ($this->welfare) {
            return (int) $this->calcHalf($normalFare);
        }

        return $normalFare;
    }

    public function withPass()
    {
        $this->pass = true;
    }

    public function withWelfare()
    {
        $this->welfare = true;
    }

    abstract protected function calcNormalFare();

    protected function calcHalf($price)
    {
        if (($price / 10) % 2) {
            return ceil(($price / 10) / 2) * 10;
        }

        return $price / 2;
    }
}
