<?php

namespace App\Service;

interface PasswordServiceInterface {
    public function encrypt(string $password): string;
}