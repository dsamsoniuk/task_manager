<?php

namespace App\Dto;

class ScheduleDto {
    public function __construct(
        public string $title = '', 
        public string $description = '', 
        public string $status = '',
        public string $date = '',
        public string $work_hours = '',
    ){}

}