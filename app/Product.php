<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
public function getPath(){
        return "uploads/" . $this->picture;
}
}
