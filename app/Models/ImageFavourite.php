<?php

namespace App\Models;
use App\Models\User;
use App\Models\Image;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageFavourite extends Model
{
    use HasFactory;
    protected $table= 'imagefavourities';
    protected $fillable = [
        'users_id',
        'images_id',
       
    ];
   public function users(){
       return $this->belongsTo(User::class);
   }
    public function images(){
        return $this->belongsTo(Image::class);
    }
}
