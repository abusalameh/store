<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Http\Requests;
use App\Invoice;
use App\Payment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class DashboardController extends Controller
{
    public function index()
    {	
    	// Create Dates to retrive checks within a week from today
    	$today =  Carbon::now();
		$nextWeek = (Carbon::now())->addDays(8);

		// Grap the checks 
    	$upcomingChecks = Payment::checks();
    	$filterd = new Collection();

    	// Grap Latest Payments 
    	$latestPayments = Payment::where('payment_method','cash')->limit(10)
    	                                                        ->with('customer')
    	                                                        ->with('invoice')
    	                                                        ->get()
    	                                                        ->sortByDesc('created_at');	

    	// Filter checks by (Due_to) Property 
    	foreach($upcomingChecks as $check){
    		if ($check->due_to->between($today,$nextWeek)){
    			$filterd->push($check);
    		}
    	}
    	$filterd = $filterd->sortBy('due_to');
    	$data = [
                'credit' => Payment::totalAmount(),
                'debit' => Invoice::totalDebits(),
                'notPaidCount' => count(Invoice::unPaid()),
                'paymentCount' => Payment::paymentsCount(),
                'customers' => count(Customer::all()),
                'upcomingChecks' => $filterd,
                'latestPayments' => $latestPayments,
        ];
        
        return view('dashboard',compact('data'));
    }
}
