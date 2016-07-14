<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvoiceItem extends Model
{
    protected $table = 'invoice_items';
    protected $fillable = [
        "name",
        "quantity",
        "price",
        "product_id",
        "invoice_id",
    ];
    protected $dates = [
    	'created_at', 'updated_at',
    ];

    public function product()
    {
    	return $this->belongsTo('App\Product');
    }

    public function invoice()
    {
    	return $this->belongsTo('App\Invoice');
    }
}
