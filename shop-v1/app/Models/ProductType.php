<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    use HasFactory;
    protected $table = "product_type";
    // hasMany(urlModel, khóa ngoại, khóa chính bảng type_products) => 1 product có nhiều productType
    public function product() {
        return $this->hasMany('App\Models\Product','id_type','id');
    }
    
}
