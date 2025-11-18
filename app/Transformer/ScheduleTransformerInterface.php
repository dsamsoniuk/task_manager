<?php


namespace App\Transformer;

use App\Dto\ScheduleDto;

interface ScheduleTransformerInterface
{
    public function toDto(array $data): ScheduleDto;
}
