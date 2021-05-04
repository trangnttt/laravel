<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;
    // khai báo tên bảng
    protected $table = "bills";

    public function customer() {
        return $this->belongsTo('App\Customer','id_customer','id');
    }
    
    public function bill_detail() {
        return $this->hasMany('App\BillDetail','id_bill','id');
    }
}
