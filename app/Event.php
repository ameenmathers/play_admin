<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';
    protected $primaryKey = 'eid';


    public function images()
    {
        return $this->hasMany(image::class,'eid','eid');
    }
}
