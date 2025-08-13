<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Page extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'name', 'slug', 'title', 'page', 'keyword', 'description', 'status', 'created_at', 'updated_at'];
    
}
