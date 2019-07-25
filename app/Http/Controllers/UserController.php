<?php

namespace App\Http\Controllers;

use Hash;
use Auth;
use App\User;
use App\Role;
use Illuminate\Http\Request;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\ChangePasswordRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(10);
        $roles = Role::all();
        return view('user_management.users.index', compact('users', 'roles'));
    }

    public function changePassword(ChangePasswordRequest $request)
    {
        if($request->validated()) {
            $user = Auth::user();
            if(Hash::check($request->old_password, Auth::user()->password)) {
                $user->password = bcrypt($request->password);
                $user->save();
                $stat = [
                    'msg'       =>  'Password Changed Successfully.',
                    'variant'   =>  'success',
                ];
            } else {
                $stat = [
                    'msg'       =>  'Old Password Incorrect.',
                    'variant'   =>  'danger',
                ];
            }
            return redirect()->back()
                            ->with('status', $stat);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
        if($request->validated()) {
            $user = new User();
            $user->fill($request->all());
            $user->password = bcrypt($request->password);
            $user->save();

            return redirect()->route('users.index')
                             ->with('status', [
                                'msg'       =>  'User Successfully Created.',
                                'variant'   =>  'success',
                             ]);
        }

        return redirect()->back()
                         ->withErrors('status', [
                            'msg'       =>  'Something went wrong.',
                            'variant'   =>  'danger',
                         ])->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        if($request->validated()) {
            $user->fill([
                'name'      =>  $request->name,
                'email'      =>  $request->email,
                'role_id'      =>  $request->role_id,
            ]);
            if($request->password) {
                $user->password = bcrypt($request->password);
            }
            $user->save();

            return redirect()->route('users.index')
                             ->with('status', [
                                'msg'       =>  'User Successfully Updated.',
                                'variant'   =>  'success',
                             ]);
        }

        return redirect()->back()
                         ->withErrors('status', [
                            'msg'       =>  'Something went wrong.',
                            'variant'   =>  'danger',
                         ])->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')
                         ->with('status', [
                            'msg'       =>  'User Removed Successfully.',
                            'variant'   =>  'success',
                         ]);
    }
}
