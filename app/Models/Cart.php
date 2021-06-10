<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'cart';
    protected $fillable = 
    [
        'users_id','menu_id','order_id',
    ];

    public function menu(){
        return $this->hasOne(Menu::class,'id','menu_id');
    }
      public function user(){
        return $this->belongsTo(User::class,'users_id','id');
    }
    public function transaction(){
        return $this->hasOne(Transaction::class,'order_id','order_id');
    }
}
