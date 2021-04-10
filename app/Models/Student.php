<?php

namespace App\Models;
use App\Models\Role;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable=[
        'id',
        'name',
        'role_id'
    ];
    public function roles()
    {
        return $this->belongsTo(Role::class);
    }
}
