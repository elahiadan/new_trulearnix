<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReferralReward extends Model
{
    protected $fillable = ['user_id', 'points', 'description'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
