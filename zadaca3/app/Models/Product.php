<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $primaryKey = 'productCode';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'productCode',
        'productName',
        'productLine',
        'productScale',
        'productVendor',
        'productDescription',
        'quantityInStock',
        'buyPrice',
        'MSRP',
    ];
}



