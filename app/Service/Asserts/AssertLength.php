<?php

namespace App\Service\Asserts;

class AssertLength implements AssertInterface {

    public function __construct(private int $min = 0, private int $max = 0){}
    public function __tostring(): string{
        $constrain = [];
        if ($this->min) {
            $constrain[] = sprintf('min:%s', $this->min);
        }
        if ($this->max) {
            $constrain[] = sprintf('max:%s', $this->max);
        }
        return implode('|', $constrain);
    }
}