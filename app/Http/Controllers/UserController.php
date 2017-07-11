<?php

namespace App\Http\Controllers;

use App\Http\Model\User;
use App\Http\Model\role_user;
use Bican\Roles\Models\Role;
use function dd;
use Illuminate\Http\Request;

use App\Http\Requests;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::latest()->get(['id','name','tel','belong_id']);
        return view('user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all(['id','name']);
        return view('user.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $belong_id = User::where('name',$request->get('belong_name'))->get(['belong_id']);
        if ($belong_id->isEmpty())
            return back();

        $user = User::create($request->all());
        $role = collect($request->except(['name','idcard','bank','kaihuhang','bankcard','tel','_token']));
        $user->attachRole($role->toArray());
        return redirect('/user');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Role_user::where('user_id', $id)->delete();
        $user = User::destroy($id);
        if ($user==0)
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
