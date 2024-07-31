<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['id','name','slug','description','brand','price','stock','image','visible','created_at','updated_at'];

    public function categories(){
        return $this->belongsToMany('App\Models\Category');
    }
}
