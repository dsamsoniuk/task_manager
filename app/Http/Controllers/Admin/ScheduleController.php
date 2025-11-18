<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreScheduleRequest;
use App\Mapper\ScheduleMapper;
use App\Models\Schedule;
use App\Repository\ScheduleRepositoryInterface;
use App\Transformer\ScheduleTransformerInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class ScheduleController extends Controller
{
    public function index(ScheduleRepositoryInterface $scheduleRepo): Response
    {
        $schedules = $scheduleRepo->findAll(1000);
        $mapped = ScheduleMapper::indexMap($schedules);

        return Inertia::render('Dashboard/Schedule/Index', [
            'schedules' => $mapped,
        ]);
    }

    public function create(): Response
    {
        return Inertia::render('Dashboard/Schedule/Create',[
            'statusList' => Schedule::$statusList
        ]);
    }

    public function store(
        StoreScheduleRequest $request, 
        ScheduleRepositoryInterface $userRepo,
        ScheduleTransformerInterface $userTransformer
        )
    {
        $userDto = $userTransformer->toDto($request->validated());
        $userRepo->create($userDto);

        return redirect()
            ->route('dashboard.schedule.index')
            ->with('success', 'Dodany do harmonogramu wpis!');
    }

    public function edit(Schedule $schedule): Response
    {
        return Inertia::render('Dashboard/Schedule/Edit', [
            'schedule' => $schedule,
            'statusList' => Schedule::$statusList
        ]);
    }

    public function update(
        StoreScheduleRequest $request, 
        Schedule $schedule,
        ScheduleRepositoryInterface $scheduleRepo,
        ScheduleTransformerInterface $scheduleTransformer
        ): RedirectResponse
    {
        $scheduleDto = $scheduleTransformer->toDto($request->validated());
        $scheduleRepo->update($schedule, $scheduleDto);

        return redirect()
            ->route('dashboard.schedule.index')
            ->with('success', 'Wpis zaktualizowany!');
    }
    public function destroy(Schedule $schedule, ScheduleRepositoryInterface $scheduleRepo): RedirectResponse 
    {
        $scheduleRepo->delete($schedule);

        return redirect()
            ->route('dashboard.schedule.index')
            ->with('success', 'Wpis usunięty!');
    }
}
