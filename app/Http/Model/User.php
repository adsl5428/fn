<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;
use Bican\Roles\Traits\HasRoleAndPermission;
use Bican\Roles\Contracts\HasRoleAndPermission as HasRoleAndPermissionContract;

class User extends Model implements HasRoleAndPermissionContract
{
    use  HasRoleAndPermission;
    protected $table='fn_users';
}
