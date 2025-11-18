<?php
namespace App\Repository;

use App\Dto\ScheduleDto;
use App\Models\Schedule;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

interface ScheduleRepositoryInterface{
    public function create(ScheduleDto $user): Schedule;
    public function update(Schedule $user, ScheduleDto $userDto): void;
    public function delete(Schedule $user): void;
    public function findAll(int $limit = 10): Collection;
}