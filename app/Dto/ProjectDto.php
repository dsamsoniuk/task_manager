<?php

namespace App\Dto;

class ProjectDto {
    public function __construct(
        public int|null $id = null, 
        public string $name = '', 
        public string $description = '', 
        public int $priority = 0, 
    ){}

}