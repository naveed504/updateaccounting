<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageFavourite extends Model
{
    use HasFactory;
    protected $table= 'imagefavourities';
    protected $fillable = [
        'user_id',
        'image_id',
       
    ];
}
