<?php


namespace App\Transformer;

use App\Dto\ScheduleDto;

class ScheduleTransformer implements ScheduleTransformerInterface
{

    public function toDto(array $data): ScheduleDto {
        $user = new ScheduleDto(
            $data['title'],
            $data['description'],
            $data['status'],
            $data['date'],
            $data['work_hours'],
        );
    
        return $user;
    }
}
