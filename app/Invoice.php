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
        "invoice_type",
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

    /**
     * @param  $query Query Builder Instance 
     * @param  integer [0: unpaid, 1: paid]
     * @return Invoice Instance 
     * This method brings the invoices using status [paid or unpaid]
     */
    public function scopePaymentStatus($query,$status = 0)
    {
        return $query->where('status',$status);
    }

    /**
     * @param  $query
     * @param  $type [integer] [1: customer, 2:supplier]
     * @return Invoice Instance 
     * This method gets invoices only for suppliers
     */
    public function scopeClientInvoices($query,$type = 1)
    {
        return $query->where('invoice_type',$type);
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
