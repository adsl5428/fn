<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Bican\Roles\Traits\HasRoleAndPermission;
use Bican\Roles\Contracts\HasRoleAndPermission as HasRoleAndPermissionContract;

class User extends Model implements HasRoleAndPermissionContract
{
    use SoftDeletes;
    use  HasRoleAndPermission;
    protected $table='fn_users';
    protected $dates = ['deleted_at'];

    protected $fillable =array('name','idcard','bank','kaihuhang','bankcard','tel') ;
}
