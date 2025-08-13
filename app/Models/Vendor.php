<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vendor extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'organization', 'address', 'email', 'contact', 'establishment_year', 'gst', 'business_type', 'status', 'created_at', 'updated_at'];

    public function getCreatedAtAttribute($value)
    {
        return date("h:i:s a | m d Y", strtotime($value));
    }
}
