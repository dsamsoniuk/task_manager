<?php


namespace App\Transformer;

use App\Dto\NoteDto;

class NoteTransformer implements NoteTransformerInterface
{

    public function toDto(array $data): NoteDto {
        $project = new NoteDto(
            id: $data['id'] ?? null,
            title: $data['title'] ?? '',
            priority: $data['priority'] ?? 0,
            description: $data['description'] ?? '',
            is_visible: $data['is_visible'] ?? 1,
            project_id: $data['project_id'] ?? null,
        );
        
        return $project;
    }
}
