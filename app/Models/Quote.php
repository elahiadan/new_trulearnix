<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Quote extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'number', 'product_id', 'description', 'status_id', 'created_at', 'updated_at'];

    public function getCreatedAtAttribute($value)
    {
        return date("h:i:s a | m d Y", strtotime($value));
    }


    
}
