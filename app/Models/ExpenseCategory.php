<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpenseCategory extends Model
{
    use HasFactory;


    public function creatorrInfo(){
        return $this->belongsTo('App\Models\User', 'expcate_creator', 'id');
    }
}
