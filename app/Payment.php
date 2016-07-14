<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payments';
    protected $fillable = [
        'payment_method',
        'due_to',
        'amount',
        'created_at',
        'customer_id',
        'invoice_id',
    ];
    protected $dates = [
    	'created_at', 'updated_at', 'due_to',
    ];

    public function customer()
    {
    	return $this->belongsTo('App\Customer');
    }

    public function invoice()
    {
    	return $this->belongsTo('invoice');
    }

    public function scopePayment($query, $type)
     {
         return $query->where('payment_method', $type);
     }

  }
