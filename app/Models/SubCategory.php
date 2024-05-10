<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'main_category_id' ,
    ];
    public function mainCategory(){
        return $this->belongsTo(MainCategory::class,'main_category_id','id');
    }
}
