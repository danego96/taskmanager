<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(): View
    {
        $users = User::paginate(5);
        return view('users.index', compact('users'));
    }

    public function show(User $user): View
    {
        $tasks = $user->tasks;

        return view('users.show', compact('user', 'tasks'));
    }
}