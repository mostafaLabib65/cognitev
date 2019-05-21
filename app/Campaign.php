<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    public $table = 'campaigns';
    public $fillable = [
        'name',
        'country',
        'budget',
        'goal',
        'category'
    ];

    public static $rules = [
        'name'=>'required',
        'country'=>'required',
        'budget'=>'required',
        'goal'=>'required'
    ];

    protected $casts = [
        'name'=>'string',
        'country'=>'string',
        'budget'=>'float',
        'goal'=>'string',
        'category'=>'string'
    ];
}
