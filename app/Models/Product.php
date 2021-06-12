<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = ['name','slug', 'origin_price', 'sale_price', 'content', 'user_id'];

    const STATUS_INIT = 0;
    const STATUS_BUY = 1;
    const STATUS_STOP = -1;

    public static $status_text = [
        self::STATUS_INIT => 'Đang nhập',
        self::STATUS_BUY => 'Đang bán',
        self::STATUS_STOP => 'Ngừng bán'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function orders(){
        return $this->belongsToMany(Order::class)->withPivot('product_id');
    }
    public function images(){
        return $this->hasMany(Image::class);
    }

    public function getStatusTextAttribute(){
        return self::$status_text[$this->status];
    }
}