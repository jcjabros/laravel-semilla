<?php

namespace App;
use App\PCategory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function category(){
        return $this->belongsTo(PCategory::class);
    }
}
