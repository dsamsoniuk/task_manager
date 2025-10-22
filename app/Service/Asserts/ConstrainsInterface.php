<?php

namespace App\Service\Asserts;

interface ConstrainsInterface {
    public function add(...$asserts): string;
}