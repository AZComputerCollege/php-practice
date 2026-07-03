<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['id','pname','pcode','desc','pprice','qty','is_active','created_at','updated_at'];
}
