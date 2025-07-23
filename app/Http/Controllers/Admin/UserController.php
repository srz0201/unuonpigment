<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $models = User::latest()->get();

        return view('admin.user.index', compact('models'));
    }

    public function show(User $user)
    {
        $buyOrders = $user->buyOrders()->where('status', '!=', 0)->latest()->get();
        $sellOrders = $user->sellOrders()->latest()->get();
        $loginLogs = $user->loginLogs()->latest()->limit(15)->get();
        $newTickets = $user->tickets()->latest()->limit(10)->get();

        return view('admin.users.show', compact('user', 'buyOrders', 'sellOrders', 'loginLogs', 'newTickets'));
    }

    public function edit(User $user)
    {
        return view('admin.user.edit', compact(['user']));
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'mobile' => 'required|unique:users',
            'password' => 'required',
        ]);

        User::create([
            'name' => $request->name,
            'mobile' => $request->mobile,
            'password' => Hash::make($request->password),
        ]);

        session()->flash('alert-success', ['انجام شد.']);

        return back();

    }

    public function update(Request $request, User $user)
    {

        $request->validate([
            'name' => 'required',
        ]);

        if ($request->mobile != $user->mobile) {
            $request->validate([
                'mobile' => 'required|unique:users',
            ]);
        }

        if (isset($request->password)) {

            $user->update([
                'password' => Hash::make($request->password),
            ]);
        }

        $user->update([
            'name' => $request->name,
            'mobile' => $request->mobile,

        ]);

        session()->flash('alert-success', ['انجام شد.']);

        return back();

    }

    public function userRole()
    {

        $models = User::latest()->get();
        $roles = Role::all();

        return view('admin.user.role', compact('models', 'roles'));

    }

    public function attachRole(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'role_id' => 'required',
        ]);

        User::find($request->user_id)->syncRoles($request->role_id);
        session()->flash('alert-success', ['انجام شد.']);

        return back();

    }

    public function detachRole(User $user, Role $role)
    {

        $user->detachRole($role);
        session()->flash('alert-success', ['انجام شد.']);

        return back();

    }
}
