<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// TODO : add soft deletes
class Customer extends Model
{

    protected $table = 'customers';
	protected $fillable = [
        'xid',
        'name',
        'address',
        'phone',
        'workgroup',
        'admin',
    ];

    /**
     * [$dates description]
     * @var [type]
     */
    protected $dates = [
    	'created_at', 'updated_at',
    ];

    public function invoices()
    {
    	return $this->hasMany('App\Invoice');
    }

    public function payments()
    {
    	return $this->hasMany('App\Payment');
    }

    public function workgroup()
    {
        return str_split($this->workgroup);
    }

    public function scopeSuppliers($query)
    {
        return $query->where('workgroup',2)->where('admin',0);
    }
    public function scopeCustomers($query)
    {
        return $query->where('workgroup',1)->where('admin',0);
    }
}
