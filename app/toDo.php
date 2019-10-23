<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class toDo extends Model
{
    protected $fillable = [
        'title', 'desc', 'user_id'
    ];
}
