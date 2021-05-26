<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $table = 'tasks';

    public function getNameAttribute($value){
        return ucfirst($value);
    }
    // public function getNewNameAttribute(){
    //     return ucfirst($this->name); //bien dau vao ben giao dien se la new_name
    // }

    public function getStatusTextAttribute(){
        if($this->status == 2){
            echo "Đã Hoàn Thành";
        }
        else
        {
            echo "Đang làm";
        }
    }

    public function setNameAttribute($value){
        $this->attributes['name'] = ucfirst($value);
    }
    
    public function getPriorityNameAttribute(){
        if($this->priority == 2){
            echo "Khẩn cấp";
        }
        elseif($this->priority == 1)
        {
            echo "Quan trọng";
        }else{
            echo "Bình Thường";
        }
    }

    const STATUS = [
        'display' => 1,
        'none' => 2
    ];
}
