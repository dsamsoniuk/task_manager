<?php

namespace App\Repository;

use App\Dto\UserDto;
use App\Models\User;
use App\Repository\UserRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class UserRepository implements UserRepositoryInterface
{
    public function create(UserDto $user): User
    {
        return User::create((array) $user);
    }
    public function update(User $user, UserDto $userDto): void
    {
        $user->update((array) $userDto);
    }
    public function delete(User $user): void
    {
        $user->delete();
    }
    /**
     * Summary of findBy
     * @param array $columns
     * @param int $limit
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function findByLimit(int $limit = 10): LengthAwarePaginator {
        return (new QueryBuilder())
            ->select(User::class, 'id', 'name', 'email', 'created_at')
            ->paginate($limit);
    }
}