<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductLine extends Model
{
    protected $primaryKey = 'productLine';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'productLine',
        'textDescription',
        'htmlDescription',
        'image',
    ];
}