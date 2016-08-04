<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = [
        'xid',
        'name',
        'description',
        'notes',
        'price',
        'cost',
        'quantity',
        'image',
        'category_id',
    ];
    protected $dates = [
    	'created_at', 'updated_at',
    ];

    public function category()
    {
    	return $this->belongsTo('App\Category');
    }

    public function invoiceItems()
    {
    	return $this->hasMany('App\InvoiceItem');
    }
}
