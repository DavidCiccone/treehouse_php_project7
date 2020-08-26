<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ToDo extends Model
{
    protected $table = 'to_dos';
    protected $fillable = [
        'name',
        'status'
    ];

}
