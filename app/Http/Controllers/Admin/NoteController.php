<?php 

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreNoteRequest;
use App\Http\Requests\UpdateNoteRequest;
use App\Models\Note;
use App\Models\Project;
use App\Repository\NoteRepositoryInterface;
use App\Repository\ProjectRepositoryInterface;
use App\Transformer\NoteTransformerInterface;
use Inertia\Inertia;
use App\Http\Controllers\Controller;

class NoteController extends Controller
{
    public function __construct(
        private NoteRepositoryInterface $noteRepo,
        private ProjectRepositoryInterface $projectRepo,
        private NoteTransformerInterface $noteTransformer,
    ){
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notes = $this->noteRepo->findByLimit(limit: 2);
        return Inertia::render('Dashboard/Notes/Index', [
            'notes' => $notes
        ]);
    }
    public function indexByPage(int $page = 1)
    {
        $notes = $this->noteRepo->findByLimit(page: $page, limit: 2);
        return ['notes' => $notes];
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createByProject(Project $project)
    {
        $projectList = $this->projectRepo->findAll();
        return Inertia::render('Dashboard/Notes/Create',[
            'project' => $project,
            'projectList' => $projectList,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNoteRequest $request)
    {
        $userDto = $this->noteTransformer->toDto($request->validated());
        $note = $this->noteRepo->create($userDto);

        return redirect()
            ->route('project-notes.showNotes', [
                'project' => $note->project
            ])
            ->with('success', 'Nota dodana!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Note $note)
    {
        $projectList = $this->projectRepo->findAll();
        return Inertia::render('Dashboard/Notes/Edit', [
            'note' => $note,
            'projectList' => $projectList,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNoteRequest $request, Note $note)
    {
        $userDto = $this->noteTransformer->toDto($request->validated());
        $this->noteRepo->update($note, $userDto);

        return redirect()
                ->route('project-notes.showNotes', [
                'project' => $note->project
            ])
            ->with('success', 'Nota zaktualizowany!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note)
    {
        $this->noteRepo->delete($note);

        return redirect()
            ->route('project-notes.showNotes', [
                'project' => $note->project
            ])
            ->with('success', 'Nota usunięty');
    }
    public function hide(Note $note)
    {
        $this->noteRepo->hide($note);

        return redirect()
            ->route('project-notes.showNotes', [
                'project' => $note->project
            ])
            ->with('success', 'Nota ukryta');
    }
}
