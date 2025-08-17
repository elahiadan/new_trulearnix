<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = ['country_code', 'country_name', 'currency_code', 'currency_name', 'rate_to_inr', 'population', 'capital', 'continent_name'];
}
