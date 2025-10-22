<?php

namespace App\Repository;

use App\Dto\ProjectDto;
use App\Models\Project;
use Illuminate\Pagination\LengthAwarePaginator;

class ProjectRepository implements ProjectRepositoryInterface
{
    public function create(ProjectDto $project): Project
    {
        return Project::create((array) $project);
    }
    public function update(Project $project, ProjectDto $userDto): void
    {
        $project->update((array) $userDto);
    }
    public function delete(Project $project): void
    {
        $project->delete();
    }
    public function findByLimit(int $limit = 10): LengthAwarePaginator {
        return (new QueryBuilder())
            ->select(Project::class, 'id', 'name')
            ->paginate($limit);
    }
}