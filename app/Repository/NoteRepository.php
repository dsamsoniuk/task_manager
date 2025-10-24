<?php

namespace App\Repository;

use App\Dto\NoteDto;
use App\Models\Note;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class NoteRepository implements NoteRepositoryInterface
{
    public function create(NoteDto $note): Note
    {
        unset($note->id);
        return Note::create((array) $note);
    }
    public function update(Note $note, NoteDto $userDto): void
    {
        $note->update((array) $userDto);
    }
    public function delete(Note $note): void
    {
        $note->delete();
    }
    public function hide(Note $note): void
    {
        $note->update(['is_visible' => false]);
    }
    public function findByLimit(int $limit = 10): LengthAwarePaginator {
        return (new QueryBuilder())
            ->select(Note::class, 'id', 'title', 'is_visible')
            ->orderBy('updated_at','desc')
            ->paginate($limit);
    }
    public function findByVisiblity(int $isVisible = 1, int $project_id = null): Collection {
        $query = (new QueryBuilder())
            ->select(Note::class, 'id', 'title', 'description','priority','project_id')
            ->where('is_visible', '=', '?');

          if ($project_id) {
            $query->where('project_id', '=', '?');
          }

          $query->setBindings([$isVisible, $project_id]);

          return $query
            ->orderBy('priority','desc')
            ->get();
    }
}