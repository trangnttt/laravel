<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;
    // khai báo tên bảng
    protected $table = "bills";
    protected $fillable = ['id_customer', 'date_order', 'total', 'payment', 'note'];
    public function customer() {
        return $this->belongsTo('App\Models\Customer','id_customer','id');
    }
    
    public function bill_detail() {
        return $this->hasMany('App\Models\BillDetail','id_bill','id');
    }
}
