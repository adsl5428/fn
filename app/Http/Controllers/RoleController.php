<?php

namespace App\Http\Controllers;

use App\Http\Model\Permission_role;
use App\Http\Model\User;
use Bican\Roles\Models\Permission;
use Bican\Roles\Models\Role;
use function count;
use function dd;
use Illuminate\Http\Request;

use App\Http\Requests;
use function var_dump;
use function view;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $Role = Role::create([
//            'name' => 'Admin',
//            'slug' => 'admin',
//            'description' => '', // optional
//            'level' => 1, // optional, set to 1 by default
//        ]);
//
//        return 'done';


        $roles = Role::latest()->get(['id','name','level','slug']);
        return view('role.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all(['id','name']);
        return view('role.create',compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request->all());

        $collection = collect($request->only(['name','slug','level','description']));
        $role = Role::create($collection->toArray());

        $permission = collect($request->except(['name','slug','level','description','_token']));
        $role->attachPermission($permission->toArray());

        return redirect('/role');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::findorfail($id);
        $permissions = Permission::all(['id','name']);
        $role_permissions = Permission_role::where('role_id',$id)->get(['permission_id']);
//        dd($role_permissions[0]->permission_id);
        return view('role.edit',compact('role','permissions','role_permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
//        dd($request->all());
        $role = Role::findorfail($id);
        $role ->update($request->only(['name','slug','level','description']));
        $role->detachAllPermissions(); // 删除全部

        $permission = collect($request->except(['name','slug','level','description','_token','_method']));
//        dd($permission->toArray());
        $role->attachPermission($permission->toArray());
        return redirect('/role');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::destroy($id);
        if ($role==0)
        {
            $data = [
                'status' => 0,
                'msg' => '删除失败，请稍候再试。',
            ];
        }
        else
        {
            $data = [
                'status' => 1,
                'msg' => '删除成功',
            ];
        }
        return $data;
    }
}
