<?php
namespace NagoyaPhp\Vol12;

use NagoyaPhp\Vol12\Fare\Factory;

class App
{
    /**
     * @var InputParser
     */
    private $inputParser;

    /**
     * @var Factory
     */
    private $factory;

    public function __construct()
    {
        $this->inputParser = new InputParser();
        $this->factory = new Factory();
    }

    public function run($input)
    {
        $data = $this->inputParser->parse($input);
        $group = $this->factory->create($data['fare'], $data['passengers']);
        return $group->calc();
    }
}
