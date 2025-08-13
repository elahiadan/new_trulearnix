<?php

namespace App\Models;

use App\Models\HomeProducts;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Homepage extends Model
{
    use HasFactory;

    protected $fillable = [];

    public function getCreatedAtAttribute($value)
    {
        return date("h:i:s a | m d Y", strtotime($value));
    }

    public function homeproducts()
    {
        return $this->hasMany(HomeProducts::class, 'homepage_id');
    }

    
}
