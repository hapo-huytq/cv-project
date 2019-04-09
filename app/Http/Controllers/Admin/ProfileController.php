<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\ProfileRequest;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.admin');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('admin.pages.profile');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProfileRequest $request)
    {
        $admin = Admin::findOrFail(Auth::guard('admin')->user()->id);
        $admin->name = $request->name;
        $admin->phone = $request->phone;
        if ($request->hasFile('avatar')) {
            Storage::disk('avatar_upload')->delete('admin/'.$admin->avatar);
            $fileExtension = '.'.$request->avatar->extension();
            $imageName = 'img'.uniqid().$fileExtension;
            $request->file('avatar')->storeAs('admin/', $imageName, 'avatar_upload');
            $admin->avatar = $imageName;
        }
        $admin->save();
        return redirect()->back();
    }
}
