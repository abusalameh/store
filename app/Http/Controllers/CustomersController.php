<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Http\Requests;
use App\Invoice;
use App\InvoiceItem;
use App\Payment;
use App\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use JavaScript;
class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('customers.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        JavaScript::put([
            'create' => true,
        ]);
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Customer::create($request->all());
        return [
            'title' => trans('lang.operationSuccess'),
            'message' =>  trans('lang.addSuccess')
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = Customer::findOrFail($id);
        $cash = [];
        $checks = [];
        $balance = [
            "totalCredit" => 0,
            "totalDebit" => 0,
        ];

        foreach ($customer->payments as $payment){
            if ($payment->payment_method == 'check'){
                array_push($checks,$payment);
                $balance["totalCredit"] += $payment->amount;
                continue;
            }
            $balance["totalCredit"] += $payment->amount;
            array_push($cash,$payment);
        }

        foreach($customer->invoices as $invoice){
            $balance["totalDebit"] += $invoice->_total;
        }

        JavaScript::put([
            'customer' => $customer,
            'payments' => [
                $cash,
                $checks,
            ],
            'balance' => $balance,
            'invoices' => $customer->invoices,
            'products' =>  Product::all(),
        ]);
        $current_date = Carbon::parse(Carbon::now())->format('m/d/Y');
        return view('customers.show',compact('current_date'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        JavaScript::put([
            'customer' => Customer::findOrFail($id),
        ]);
        return view('customers.edit');
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
        $customer = Customer::findOrFail($id);
        $customer->update($request->all());

        return [
            'title' => trans('lang.operationSuccess'),
            'message' => trans('lang.updateSuccess')
        ];
    }

    public function storeInvoice(Request $request){
        $items = $request->data["items"];
        $date = Carbon::createFromFormat('m/d/Y', $request->data["date"])->toDateTimeString();
        $customer_id = $request->data["customer_id"];
        $total = 0;
            foreach ($items as $item){
                $total += ($item["price"] * $item["qty"]);
            }
            $invoice = Invoice::create([
                "xid" => str_random(20),
                "description" => $request->data["description"],
                "status" => 0,
                "total" => $total,
                "_total" => $total,
                "discount" => 0,
                "invoice_date" => $date,
                "customer_id" => $customer_id,
            ]);
            foreach ($items as $item){
                // Update Product Quantity
                $product = Product::find($item["productId"]);
                $product->quantity = $product->quantity - $item["qty"];
                $product->save();

                $invoiceItem = InvoiceItem::create([
                    "name" => $item["name"],
                    "price" => $item["price"],
                    "quantity" => $item["qty"],
                    "product_id" => $item["productId"],
                    "invoice_id" => $invoice["id"],
                ]);
            }

            return [
                'title' => trans('lang.operationSuccess'),
                'message' =>  trans('lang.addSuccess')
            ];

    }

    public function storePayment(Request $request)
    {   
        $payment_date = Carbon::createFromFormat('m/d/Y', $request->data["date"])->toDateTimeString();
        $due_to = Carbon::createFromFormat('m/d/Y', $request->data["due_to"])->toDateTimeString();

        $invoice = Invoice::findOrFail($request->data["invoice_id"]);
        if ($invoice->_total > 0){
            $invoice->_total -= $request->data["amount"];
            if ($invoice->_total == 0){
                $invoice->status = 1;
            }
            $invoice->save();

            $payment = new Payment();
            $payment->payment_method = $request->data["payment_method"];
            $payment->due_to = $due_to;
            $payment->created_at = $payment_date;
            $payment->amount = $request->data["amount"];
            $payment->customer_id = $request->data["customer_id"];
            $payment->invoice_id = $request->data["invoice_id"];
            $payment->save();
        } 


        return [
            "title" => trans('lang.operationSuccess'),
            "message" => trans('lang.addSuccess'),
        ];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        if ($customer->delete()){
            return [
                'title' => trans('lang.operationSuccess'),
                'message' => trans('lang.deleteSuccess'),
            ];
        } else {
            return [
                'title' => trans('lang.operationFailed'),
                'message' => trans('lang.deleteFailed'),
            ];
        }

    }
}
