<?php

namespace App\Http\Controllers;

use Bican\Roles\Models\Permission;
use function compact;
use function dd;
use Illuminate\Http\Request;

use App\Http\Requests;
use const null;
use function redirect;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // id 名称  标识  说明  模型  创建时间  更行时间
        $permissions = Permission::latest()->get(['id','name','slug']);
        return view('permission.index',compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('permission.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request->except('_token')->toArray());
        $collection = collect($request->all());
//        dd($collection->toArray());
        Permission::create($collection->toArray());
        return redirect('/permission');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permission = Permission::findorfail($id);
        return view('permission.edit',compact('permission'));
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
        $permission = Permission::findorfail($id);
        $permission ->update($request->all());
        return redirect('/permission');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $permisson = Permission::destroy($id);

        if ($permisson==0)
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
//        return redirect()->action('PermissionController@index');
//        return redirect()->back();

    }
}
