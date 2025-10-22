<?php

namespace App\Service;

class PasswordService implements PasswordServiceInterface {
    public function encrypt(string $password): string {
        return bcrypt($password);
    }
}