<?php

namespace App\Repository;

use App\Dto\ScheduleDto;
use App\Dto\UserDto;
use App\Models\Schedule;
use App\Models\User;
use App\Repository\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class ScheduleRepository implements ScheduleRepositoryInterface
{
    public function create(ScheduleDto $user): Schedule
    {
        return Schedule::create((array) $user);
    }
    public function update(Schedule $user, ScheduleDto $userDto): void
    {
        $user->update((array) $userDto);
    }
    public function delete(Schedule $user): void
    {
        $user->delete();
    }
    /**
     * Summary of findAll
     * @param array $columns
     * @param int $limit
     * @return Collection
     */
    public function findAll(int $limit = 10): Collection {
        return (new QueryBuilder())
            ->select(Schedule::class, 'id', 'title', 'description', 'status', 'date','work_hours')
            ->limit($limit)
            ->orderBy('date','ASC')
            ->get();
    }
}