<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $table = 'roles';

    const ROLE_ADMIN = 1;
    const ROLE_USER = 2;

    protected $fillable = [
        'name', 'description','created_at','updated_at'
    ];
    
    public function users()
    {
        return $this->hasMany('App\Models\User', 'role_id');
    }
}
