<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $primaryKey = 'gid';
    protected $table = 'gallery';
}
