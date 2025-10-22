<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UserEditRequest;
use App\Transformer\UserTransformerInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserCreateRequest;
use App\Models\User;
use App\Repository\UserRepositoryInterface;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class UserController extends Controller
{
    public function index(UserRepositoryInterface $userRepo): Response
    {
        $users = $userRepo->findByLimit(10);

        return Inertia::render('Dashboard/Users/Index', [
            'users' => $users,
        ]);
    }

    public function create(): Response
    {
        return Inertia::render('Dashboard/Users/Create');
    }

    public function store(
        UserCreateRequest $request, 
        UserRepositoryInterface $userRepo,
        UserTransformerInterface $userTransformer
        )
    {
        $userDto = $userTransformer->toDto($request->validated());
        $userRepo->create($userDto);

        return redirect()
            ->route('dashboard.users.index')
            ->with('success', 'Użytkownik dodany!');
    }

    public function edit(User $user): Response
    {
        return Inertia::render('Dashboard/Users/Edit', [
            'user' => $user,
        ]);
    }

    public function update(
        UserEditRequest $request, 
        User $user,
        UserRepositoryInterface $userRepo,
        UserTransformerInterface $userTransformer
        ): RedirectResponse
    {
        $userDto = $userTransformer->toDto($request->validated());
        $userRepo->update($user, $userDto);

        return redirect()
            ->route('dashboard.users.index')
            ->with('success', 'Użytkownik zaktualizowany!');
    }
    public function destroy(User $user, UserRepositoryInterface $userRepo): RedirectResponse 
    {
        $userRepo->delete($user);

        return redirect()
            ->route('dashboard.users.index')
            ->with('success', 'Użytkownik usunięty!');
    }
}