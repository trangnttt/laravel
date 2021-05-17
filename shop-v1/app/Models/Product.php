<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = "products";
    protected $fillable = ['name', 'id_type', 'description', 'unit_price', 'promotion_price'];
    // belongsTo(urlModel, khóa ngoại, khóa chính bảng products) => 1 product thuộc về gì đó
    public function product_type() {
        return $this->belongsTo('App\Models\ProductType','id_type','id');
    }

    public function bill_detail() {
        return $this->hasMany('App\Models\BillDetail','id_bill','id');
    }

}
