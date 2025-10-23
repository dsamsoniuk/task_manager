<?php


namespace App\Transformer;

use App\Dto\ProjectDto;
use App\Service\PasswordServiceInterface;

class ProjectTransformer implements ProjectTransformerInterface
{
    public function __construct(
        private PasswordServiceInterface $passService,
    ){}
    public function toDto(array $data): ProjectDto {
        $project = new ProjectDto(
            $data['id'] ?? '',
            $data['name'] ?? '',
            $data['description'] ?? '',
        );
        return $project;
    }
}
