<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    public $fillable = ['name', 'html', 'code', 'user_id'];
}
