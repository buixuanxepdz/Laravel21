<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $table = 'images';
    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function getImageUrlAttribute(){
        return url(\Illuminate\Support\Facades\Storage::url($this->path));
    }
}
