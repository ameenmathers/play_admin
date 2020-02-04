<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Referral extends Model
{
    protected $guarded = [];


    public function referrer()
    {
        return $this->belongsTo(Referrer::class);
    }
}
