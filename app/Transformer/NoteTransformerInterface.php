<?php


namespace App\Transformer;

use App\Dto\NoteDto;

interface NoteTransformerInterface
{
    public function toDto(array $data): NoteDto;
}
