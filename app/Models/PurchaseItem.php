<?php

namespace App\Models;
use App\Models\MainDealer;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseItem extends Model
{
    use HasFactory;
  
    protected $table="purchaseitems";
    
    public function dealers()
    {
        return $this->belongsTo(MainDealer::class,'maindealer_id','id');
    }
    
}
