<?php


namespace App\Transformer;

use App\Dto\ProjectDto;

interface ProjectTransformerInterface
{
    public function toDto(array $data): ProjectDto;
}
