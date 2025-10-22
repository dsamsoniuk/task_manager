<?php


namespace App\Transformer;

use App\Dto\UserDto;
use App\Service\PasswordServiceInterface;

class UserTransformer implements UserTransformerInterface
{
    public function __construct(
        private PasswordServiceInterface $passService,
    ){}
    public function toDto(array $data): UserDto {
        $user = new UserDto(
            $data['name'],
            $data['email'],
        );
        
        if ($data['password']) {
            $user->password = $this->passService->encrypt($data['password']);
        }

        return $user;
    }
}
