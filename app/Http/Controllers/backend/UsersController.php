<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\User\storeRequest;
use App\Http\Requests\User\updateRequest;
use Spatie\Permission\Models\Permission;

class UsersController extends Controller
{
    /**
     * Display all users
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::latest()->paginate(10);

        return view('backend.users.index', compact('users'));
    }

    /**
     * Show form for creating user
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('backend.users.create',[
            'roles' => $roles
        ]);
    }

    /**
     * Store a newly created user
     *
     * @param User $user
     * @param StoreUserRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(storeRequest $request)
    { 
        
        $user = User::create(array_merge($request->only('name','email'), [
            'password' => bcrypt($request->password)
        ]));
        $user->assignRole($request->input('role'));
        return redirect()->route('users.index')
            ->withSuccess(__('User created successfully.'));
    }

    public function show(User $user)
    {
        return view('backend.users.show', [
            'user' => $user
        ]);
    }

    public function edit(User $user)
    {
        return view('backend.users.edit', [
            'user' => $user,
            'userRole' => $user->roles->pluck('name')->toArray(),
            'roles' => Role::latest()->get()
        ]);
    }

    public function update(updateRequest $request , User $user)
    {
       $user->update($request->safe()->all());

        $user->syncRoles($request->get('role'));

        return redirect()->route('users.index')
            ->withSuccess(__('User updated successfully.'));
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')
            ->withSuccess(__('User deleted successfully.'));
    }
}
