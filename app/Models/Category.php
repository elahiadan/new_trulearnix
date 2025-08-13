<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'name', 'created_at', 'updated_at'];

    public function getCreatedAtAttribute($value)
    {
        return date("h:i:s a | m d Y", strtotime($value));
    }


    
}
