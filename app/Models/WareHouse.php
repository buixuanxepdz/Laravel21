<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WareHouse extends Model
{
    use HasFactory;
    protected $table = 'warehouses';
    public function product(){
        return $this->belongsTo(Product::class);
    }

    const SIZE_M = 0;
    const SIZE_L = 1;
    const SIZE_XL = 2;

    public static $size_text = [
        self::SIZE_M => 'M',
        self::SIZE_L => 'L',
        self::SIZE_XL => 'XL'
    ];
    public function getSizeTextAttribute(){
        return self::$size_text[$this->size];
    }

    public function getSizeProductAttribute(){
        if($this->size == 0){
            return "M";
        }
        elseif($this->size == 1){
            return "L";
        }
        else{
            return "XL";
        }

    }

    const COLOR_DEN = 0;
    const COLOR_TRANG  = 1;
    const COLOR_DO  = 2;
    const COLOR_XANH  = 3;
    const COLOR_Vang  = 4;

}
