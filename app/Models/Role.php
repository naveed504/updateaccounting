<?php

namespace App\Models;
use App\Models\Student;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $fillable=[
        'id',
        'name',
    ];
    public function student()
    {
        return $this->hasMany(Student::class);
    }
}
