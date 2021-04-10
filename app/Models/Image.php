<?php

namespace App\Models;
use App\Models\ImageFavourite;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $table= 'images';
    public function imageFavourites(){
        return $this->hasMany(ImageFavourite::class);
    }
}
