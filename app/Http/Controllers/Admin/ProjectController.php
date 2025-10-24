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

    public function showNotes(
        Request $request, 
        Project $project, 
        NoteRepositoryInterface $noteRepo
    )
    {
        $page = (int) $request->get('page', 1);
        $notes = $noteRepo->findByVisiblity(
            true, 
            $project->id, 
            $page, 
            2
        );

        return Inertia::render('Dashboard/Projects/ShowNotes', [
            'notes' => $notes,
            'project' => $project,
        ]);
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
