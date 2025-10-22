<?php

namespace App\Service\Asserts;

class AssertEmail implements AssertInterface {
    public function __tostring(): string{
        return 'email';
    }
}