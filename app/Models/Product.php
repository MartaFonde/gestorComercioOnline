<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = ["id"];

    protected static function boot()
    {
        parent::boot();
        if(!app() -> runningInConsole()){
            self::creating(function($table){
                $table->shop_id = /*$table->shops-> id() -> */ auth()->id(); //DUDAS -insertaría id de user ¿?
            });
        }
    }
}
