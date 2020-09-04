<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['nombre','slug'];

    public function permissions()
    {
        return $this->belongsToMany(\App\Models\Permission::class,'roles_permissions');
    }

    public function allRolePermissions()
    {
        return $this->belongsToMany(\App\Models\Permission::class, 'roles_permissions');
    }
}
