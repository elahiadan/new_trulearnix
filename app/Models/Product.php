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

    protected $fillable = ['title', 'subtitle', 'description', 'slug', 'category_id', 'level', 'language', 'mode_of_class', 'price', 'discount_type', 'discount', 'actual_price', 'commission_type', 'commission', 'total_commission', 'currency', 'content', 'specification', 'thumbnail_img', 'status'];


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
            set: fn($value) => json_encode($value),
        );
    }
}
