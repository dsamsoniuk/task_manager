<?php

namespace App\Service\Asserts;

class AssertRequired implements AssertInterface {
    public function __tostring(): string{
        return 'required';
    }
}