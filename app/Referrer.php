<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Referrer extends Model
{
    protected $guarded = [];

    public function referrals()
    {
        return $this->hasMany(Referral::class);
    }
}
