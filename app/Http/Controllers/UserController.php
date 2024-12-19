<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Redirect;


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
        $roles = Role::all();

        return view('users.show', compact('user', 'tasks', 'roles'));
    }

    public function updateRole(Request $request, User $user)
    {
        $user->syncRoles($request->input('role'));

        return redirect()->route('users.index');
    }
}
