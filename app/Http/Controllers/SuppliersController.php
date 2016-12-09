<?php

namespace App\Http\Controllers;

use JavaScript;
use App\Customer;
use App\Http\Requests;
use App\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SuppliersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('suppliers.index');
        // dd(Customer::suppliers()->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $supplier = Customer::findOrFail($id);
        $supplier = Customer::where('id',$id)->where('workgroup',2)->first();
        if (is_null($supplier)){
            abort(404);
        }else {
            $cash = [];
            $checks = [];
            $balance = [
                "totalCredit" => 0,
                "totalDebit" => 0,
            ];
            foreach ($supplier->payments as $payment){
                if ($payment->payment_method == 'check'){
                    array_push($checks,$payment);
                    $balance["totalCredit"] += $payment->amount;
                    continue;
                }
                $balance["totalCredit"] += $payment->amount;
                array_push($cash,$payment);
            }

            foreach($supplier->invoices as $invoice){
                $balance["totalDebit"] += $invoice->_total;
            }
            JavaScript::put([
                'supplier' => $supplier,
                'payments' => [
                    $cash,
                    $checks,
                ],
                'balance' => $balance,
                'invoices' => $supplier->invoices,
                'products' =>  Product::all(),
            ]);
            $current_date = Carbon::parse(Carbon::now())->format('m/d/Y');
            return view('suppliers.show',compact('current_date'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
