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

    public static function paid (){
        return Invoice(self::where('status',1)->get());
    }

    public static function unPaid (){
        return self::where('status',0)->get();
    }

    public function payment()
    {
    	return $this->hasOne('App\Payment');
    }

    public static function totalDebits(){
        $total = 0.0;
        foreach(self::unPaid()->toArray() as $invoice){
            $total += $invoice["_total"];
        }
        return $total;
    }

}
