<?php

namespace App\Dto;

class ProjectDto {
    public function __construct(
        public string $id = '', 
        public string $name = '', 
        public string $description = '', 
    ){}

}