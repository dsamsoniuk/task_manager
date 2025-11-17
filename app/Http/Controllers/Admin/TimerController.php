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

class TimerController extends Controller
{
    public function index(UserRepositoryInterface $userRepo): Response
    {
        $users = $userRepo->findByLimit(10);

        return Inertia::render('Dashboard/Timer/Index', [
            // 'users' => $users,
        ]);
    }

}