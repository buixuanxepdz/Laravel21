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
    const STATUS_STOP = 2;

    public static $status_text = [
        self::STATUS_INIT => 'Đang nhập',
        self::STATUS_BUY => 'Đang bán',
        self::STATUS_STOP => 'Ngừng bán'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function brand(){
        return $this->belongsTo(Brand::class);
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
    public function getStatusProductAttribute(){
        if($this->status == 0){
            return "Đang nhập";
        }
        elseif($this->status == 1){
            return "Đang bán";
        }
        else{
            return "Hết hàng";
        }

    }
    public function scopeStatus($query, $request)
    {
        if ($request->has('status')) 
        {
            if($request->get('status') == -1){
                $query->orderBy('created_at','desc');
            }else{
                $query->where('status', $request->status)->orderBy('created_at','desc');
            }
           
        }

    return $query;
    }
    public function scopeCategory($query, $request)
    {
        if ($request->has('category')) 
        {
            if($request->get('category') == -1){
                $query->orderBy('created_at','desc');
            }else{
                $query->where('category_id', $request->category)->orderBy('created_at','desc');
            }
           
        }

    return $query;
    }

   
}
