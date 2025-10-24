<?php
namespace App\Repository;

use App\Dto\ProjectDto;
use App\Models\Project;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

interface ProjectRepositoryInterface{
    public function create(ProjectDto $project): Project;
    public function update(Project $project, ProjectDto $projectDto): void;
    public function delete(Project $project): void;
    public function findByLimit(int $limit = 10): LengthAwarePaginator;
    public function findAll(): Collection;
}