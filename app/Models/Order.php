<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public function products(){
        return $this->belongsToMany(Product::class)->withPivot('price','quantity');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    const ORDER_WAIT        = 0;
    const ORDER_CONFIRM     = 1;
    const ORDER_SHIPPING    = 2;
    const ORDER_FINISH      = 3;

    public static $status_text = [
        self::ORDER_WAIT        => 'Chờ xác nhận',
        self::ORDER_CONFIRM     => 'Đã xác nhận',
        self::ORDER_SHIPPING    => 'Đang giao hàng',
        self::ORDER_FINISH      => 'Đã giao hàng',
    ];

    public function getStatusTextAttribute(){
        if ($this->status == 0){
            return 'Chờ xác nhận';
        } elseif ($this->status == 1){
            return 'Đã xác nhận';
        } elseif ($this->status == 2){
            return 'Đang giao hàng';
        } elseif ($this->status == 3){
            return 'Đã giao hàng';
        }
    }
}
