<?php


namespace App\Transformer;

use App\Dto\UserDto;

interface UserTransformerInterface
{
    public function toDto(array $data): UserDto;
}
