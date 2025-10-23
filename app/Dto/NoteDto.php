<?php

namespace App\Dto;

class NoteDto {
    public function __construct(
        public int|null $id = null, 
        public string $title = '', 
        public string $description = '', 
        public int|null $project_id, 
        public int $priority = 0, 
        public bool $is_visible = true, 
    ){}

}