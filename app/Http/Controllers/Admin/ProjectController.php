<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use App\Repository\NoteRepositoryInterface;
use App\Repository\ProjectRepositoryInterface;
use App\Transformer\ProjectTransformerInterface;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProjectController extends Controller
{
    public function __construct(
        private ProjectRepositoryInterface $projectRepo,
        private ProjectTransformerInterface $projectTransform,
    ){
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = $this->projectRepo->findByLimit(10);

        return Inertia::render('Dashboard/Projects/Index', [
            'projects' => $projects,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Dashboard/Projects/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $userDto = $this->projectTransform->toDto($request->validated());
        $this->projectRepo->create($userDto);

        return redirect()
            ->route('dashboard.projects.index')
            ->with('success', 'Użytkownik dodany!');
    }

    public function showNotes(Project $project, NoteRepositoryInterface $noteRepo)
    {
        $limit = env('LIMIT_ITEMS_BY_PAGE', '10');
        $notes = $noteRepo->findByVisiblity(
            isVisible: true, 
            project_id:$project->id, 
            limit: $limit
        );

        return Inertia::render('Dashboard/Projects/ShowNotes', [
            'notes' => $notes,
            'project' => $project,
        ]);
    }
    public function notesByPage(
        Request $request,
        Project $project, 
        NoteRepositoryInterface $noteRepo,
        int $page = 1
    ){
        
        $limit = env('LIMIT_ITEMS_BY_PAGE', '10');
        $query = $request->get('q', '');
        $notes = $noteRepo->findByVisiblity(
            true, 
            $project->id, 
            $query,
            $page, 
            $limit
        );
        return ['notes' => $notes];
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return Inertia::render('Dashboard/Projects/Edit', [
            'project' => $project,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreProjectRequest $request, Project $project)
    {
        $userDto = $this->projectTransform->toDto($request->validated());
        $this->projectRepo->update($project, $userDto);

        return redirect()
            ->route('dashboard.projects.index')
            ->with('success', 'Użytkownik zaktualizowany!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $this->projectRepo->delete($project);

        return redirect()
            ->route('dashboard.projects.index')
            ->with('success', 'Użytkownik usunięty!');
    }
}
