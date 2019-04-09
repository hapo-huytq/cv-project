<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateUserRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class SuperAdminUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.admin');
        $this->middleware('supper_admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = Admin::where('type', Admin::ADMIN_ROLE)->orWhere('type', Admin::HR_ROLE)->orderBy('type')->orderBy('name', 'asc')->paginate(env('PER_PAGE'));
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
        $userAvatar = '';
        if ($request->hasFile('avatar')) {
            $fileExtension = '.' . $request->avatar->extension();
            $imageName = 'img' . uniqid() . $fileExtension;
            $request->file('avatar')->storeAs('admin/', $imageName, 'avatar_upload');
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $adminUser)
    {
        $adminUser->delete();
        return redirect()->route('admin.users.index');
    }

    public function indexUserTrash()
    {
        $users = Admin::onlyTrashed()
            ->paginate(env('PER_PAGE'));
        return view('admin.pages.super_admin.users_trash', compact('users'));
    }

    public function restoreUserTrash($adminUser)
    {
        Admin::withTrashed()
            ->find($adminUser)
            ->restore();
        return redirect()->route('users_trash');
    }

    public function removeUserTrash($adminUser)
    {
        Admin::withTrashed()
            ->find($adminUser)
            ->forceDelete();
        return redirect()->route('users_trash');
    }

    public function changeRole(Admin $adminUser)
    {
        if ($adminUser->type === Admin::ADMIN_ROLE) {
            $adminUser->type = Admin::HR_ROLE;
        } else {
            $adminUser->type = Admin::ADMIN_ROLE;
        }
        $adminUser->save();
        return redirect()->route('admin.users.index');
    }
}
