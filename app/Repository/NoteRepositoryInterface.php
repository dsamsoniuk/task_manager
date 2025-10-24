<?php
namespace App\Repository;

use App\Dto\NoteDto;
use App\Models\Note;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

interface NoteRepositoryInterface{
    public function create(NoteDto $noteDto): Note;
    public function update(Note $note, NoteDto $noteDto): void;
    public function delete(Note $note): void;
    public function hide(Note $note): void;
    public function findByLimit(int $limit = 10): LengthAwarePaginator;
    public function findByVisiblity(int $isVisible = 1, int $project_id = null): Collection ;
}