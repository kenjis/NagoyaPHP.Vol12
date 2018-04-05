<?php
namespace NagoyaPhp\Vol12;

class InputParser
{
    public function parse($input)
    {
        list($fare, $rest) = explode(':', $input);
        $passenagers = explode(',', $rest);

        return [
            'fare' => $fare,
            'passengers' => $passenagers,
        ];
    }
}
