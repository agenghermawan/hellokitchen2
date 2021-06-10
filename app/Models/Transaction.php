<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $table = 'transaction';

    protected $fillable = [
        'users_id',
        'order_id',
        'total_price',
        'address',
        'phone',
        'transaction_status'
    ];

     public function menu(){
        return $this->hasOne( Menu::class, 'id', 'menu_id' );
    }
        public function user(){
        return $this->belongsTo( User::class, 'users_id', 'id');
    }

          public function cart(){
        return $this->belongsTo( Cart::class, 'order_id', 'order_id');
    }
}
