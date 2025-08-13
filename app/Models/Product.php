<?php

namespace App\Models;

use App\Models\User;
use App\Models\Brand;
use App\Models\Status;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'category_id', 'vendor_id', 'name', 'price_range', 'status_id', 'created_at', 'updated_at'];


    public function getCreatedAtAttribute($value)
    {
        return date("h:i:s a | m d Y", strtotime($value));
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'vendor_id');
    }

    public function statuses()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }

    public function brands()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    protected function specification(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => json_encode($value),
        );
    }


    
}
