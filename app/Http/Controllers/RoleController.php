<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;
use App\Http\Requests\CreateRoleRequest;
use App\Http\Requests\UpdateRoleRequest;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::paginate(10);

        return view('user_management.roles.index', compact('roles'));
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
    public function store(CreateRoleRequest $request)
    {
        if($request->validated()) {
            $role = new Role();
            $role->fill($request->all());
            $role->is_admin = isset($request->is_admin);
            $role->save();

            return redirect()->route('roles.index')
                             ->with('status', [
                                'msg'       =>  'Role Successfully Created.',
                                'variant'   =>  'success',
                             ]);
        }

        return redirect()->back()
                         ->with('status', [
                            'msg'       =>  'Something Went Wrong.',
                            'variant'   =>  'danger',
                         ])->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
        if($request->validated()) {
            $role->fill($request->all());
            $role->is_admin = isset($request->is_admin);
            $role->save();

            return redirect()->route('roles.index')
                             ->with('status', [
                                'msg'       =>  'Role Successfully Updated.',
                                'variant'   =>  'success',
                             ]);
        }

        return redirect()->back()
                         ->with('status', [
                            'msg'       =>  'Something Went Wrong.',
                            'variant'   =>  'danger',
                         ])->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();

        return redirect()->route('roles.index')
                    ->with('status', [
                    'msg'       =>  'Role Successfully Removed.',
                    'variant'   =>  'success',
                    ]);
    }
}
