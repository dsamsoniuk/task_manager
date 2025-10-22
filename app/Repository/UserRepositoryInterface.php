<?php
namespace App\Repository;

use App\Dto\UserDto;
use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;

interface UserRepositoryInterface{
    public function create(UserDto $user): User;
    public function update(User $user, UserDto $userDto): void;
    public function delete(User $user): void;
    public function findByLimit(int $limit = 10): LengthAwarePaginator;
}