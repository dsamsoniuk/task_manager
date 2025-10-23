<?php


namespace App\Transformer;

use App\Dto\ProjectDto;

class ProjectTransformer implements ProjectTransformerInterface
{
    public function toDto(array $data): ProjectDto {
        $project = new ProjectDto(
            $data['id'] ?? '',
            $data['name'] ?? '',
            $data['description'] ?? '',
            $data['priority'] ?? '',
        );
        return $project;
    }
}
