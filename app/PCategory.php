<?php

namespace App;
use App\Product;
use App\PCategory;
use Illuminate\Database\Eloquent\Model;

class PCategory extends Model
{
    public function products(){
        return $this->hasMany(Product::class); 
     }
     public function parent()
     {
         return $this->belongsTo('App\PCategory', 'parent_id');
     }
     
     public function children()
     {
         return $this->hasMany('App\PCategory', 'parent_id');
     }
}
