<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
        public function getPath(){
                return "uploads/" . $this->picture;
        }
        public function orderproducts(){
                return $this->hasMany('App\OrderProduct');
        }

        public function category(){
                return $this->belongsTo('App\Category');
        }
}
