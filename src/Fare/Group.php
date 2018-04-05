<?php
namespace NagoyaPhp\Vol12\Fare;

class Group
{
    /**
     * @var Adult[]
     */
    private $adults = [];

    /**
     * @var Child[]
     */
    private $children = [];

    /**
     * @var Infant[]
     */
    private $infants = [];

    /**
     * @var int
     */
    private $maxFreeInfantsPerAdult = 2;

    public function add(Fare $one)
    {
        switch (true) {
            case $one instanceof Adult:
                $this->adults[] = $one;
                break;
            case $one instanceof Child:
                $this->children[] = $one;
                break;
            case $one instanceof Infant:
                $this->infants[] = $one;
                break;
        }
    }

    public function calc()
    {
        $total = 0;

        $this->setFreeInfants();

        $all = array_merge($this->adults, $this->children, $this->infants);

        foreach ($all as $one) {
            $total += $one->calc();
        }

        return $total;
    }

    private function setFreeInfants()
    {
        if (empty($this->infants)) {
            return;
        }

        $this->sortInfants();

        $maxFreeInfants = min(
            count($this->infants),
            $this->countAdults() * $this->maxFreeInfantsPerAdult
        );

        for ($i = 0; $i < $maxFreeInfants; $i++) {
            $this->infants[$i]->withAdult();
        }
    }

    private function sortInfants()
    {
        usort($this->infants, function ($a, $b) {
            if ($a->calc() === $b->calc()) {
                return 0;
            }

            return ($a->calc() < $b->calc()) ? 1 : -1;
        });
    }

    private function countAdults()
    {
        return count($this->adults);
    }
}
