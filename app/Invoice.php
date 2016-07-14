<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
	protected $table = 'invoices';
	protected $fillable = [
        "xid",
        "description",
        "status",
        "total",
        "discount",
        "_total",
        "created_at",
        "updated_at",
        "customer_id",
        "invoice_date",
    ];
    protected $dates = [
    	'created_at', 'updated_at',
    ];

    public function customer()
    {
    	return $this->belongsTo('App\Customer');
    }

    public function invoiceItems()
    {
    	return $this->hasMany('App\InvoiceItem');
    }

    public function paid ($query){
        return $query->where('status',0)->get();
    }

    public function payment()
    {
    	return $this->hasOne('App\Payment');
    }

}
