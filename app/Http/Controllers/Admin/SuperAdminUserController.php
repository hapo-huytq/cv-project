<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateUserRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Collection;

class SuperAdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = Admin::where('type', 2)->orWhere('type', 3)
            ->orderBy('type', 'asc')->orderBy('name', 'asc')->paginate(10);
        return view('admin.pages.super_admin.admin_list', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.super_admin.admin_create_account');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
        $availableRole = [2, 3];
        if (in_array($request->role, $availableRole)) {
            $userAvatar = '';
            if ($request->hasFile('avatar')) {
                $fileExtension = '.' . $request->avatar->extension();
                $imageName = 'img' . uniqid() . $fileExtension;
                $request->file('avatar')->storeAs('public/admin/', $imageName);
                $userAvatar = $imageName;
            }
            $admin = new Admin();
            $admin->name = $request->name;
            $admin->email = $request->email;
            $admin->password = Hash::make($request->password);
            $admin->phone = $request->phone;
            $admin->avatar = $userAvatar;
            $admin->type = $request->role;
            $admin->save();
            return redirect()->route('admin.users.index');
        } else {
            return redirect()->route('admin.users.create')->with('saveError', 'Create user failed');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Admin $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index');
    }

    public function indexUserTrash()
    {
        $users = Admin::onlyTrashed()
            ->paginate(10);
        return view('admin.pages.super_admin.users_trash', compact('users'));
    }

    public function restoreUserTrash($user)
    {
        Admin::withTrashed()
            ->find($user)
            ->restore();
        return redirect()->route('users_trash');
    }

    public function removeUserTrash($user)
    {
        Admin::withTrashed()
            ->find($user)
            ->forceDelete();
        return redirect()->route('users_trash');
    }

    public function changeRole(Admin $user) {
        if($user->type === 2) {
            $user->type = 3;
        } else {
            $user->type = 2;
        }
        $user->save();
        return redirect()->route('admin.users.index');
    }
}
