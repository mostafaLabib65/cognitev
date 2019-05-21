<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class draw extends Model
{
    public $table = 'draws';
    public $fillable = [
        'dimension',
        'field',
        'count',
    ];

    public static $rules = [
        'dimension'=>'required',
        'field'=>'required',
        'count'=>'required'
    ];

    protected $casts = [
        'dimension'=>'string',
        'field'=>'string',
        'count'=>'integer'
    ];
}
