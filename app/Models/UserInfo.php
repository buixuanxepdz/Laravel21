<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    use HasFactory;
    protected $table = 'users_info';
    protected $fillable = [
        'user_id',
        'phone',
        'address',
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function getImageUrlAttribute(){
        return url(\Illuminate\Support\Facades\Storage::url($this->path));
    }
}
