<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    use HasFactory;
    protected $table = "type_products";
    // hasMany(urlModel, khóa ngoại, khóa chính bảng type_products) => 1 product có nhiều productType
    public function product() {
        return $this->hasMany('App\Product','id_type','id');
    }
    
}
