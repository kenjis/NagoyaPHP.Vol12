<?php
namespace NagoyaPhp\Vol12\Fare;

abstract class Fare
{
    protected $adultRegularFare;
    protected $pass = false;
    protected $welfare = false;

    public function __construct($adultRegularFare)
    {
        $this->adultRegularFare = $adultRegularFare;
    }

    public function calc()
    {
        if ($this->isFree()) {
            return 0;
        }

        $regularFare = (int) $this->calcRegularFare();

        if ($this->welfare) {
            return (int) $this->calcHalf($regularFare);
        }

        return $regularFare;
    }

    public function withPass()
    {
        $this->pass = true;
    }

    public function withWelfare()
    {
        $this->welfare = true;
    }

    abstract protected function calcRegularFare();

    protected function calcHalf($price)
    {
        if (($price / 10) % 2) {
            return ceil(($price / 10) / 2) * 10;
        }

        return $price / 2;
    }
}
