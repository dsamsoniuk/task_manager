<?php

namespace App\Service\Asserts;

class AssertNullable implements AssertInterface {
    public function __tostring(): string{
        return 'nullable';
    }
}