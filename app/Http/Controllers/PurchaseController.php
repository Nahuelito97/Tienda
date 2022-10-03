<?php

namespace App\Http\Controllers;

use App\Purchase;
use App\Provider;
use App\Http\Requests\Purchase\StoreRequest;
use App\Http\Requests\Purchase\UpdateRequest;


class PurchaseController extends Controller
{
    public function index()
    {
        $purchases = Purchase::get();
        return view('admin.purchase.index', compact('purchases'));

    }


    public function create()
    {
        $provider = Provider::get();
        return view('admin.purchase.create', compact('provider'));
    }

    public function store(StoreRequest $request)
    {
        $purchase = Purchase::create($request->all());

        foreach ($request->product_id as $key => $product) {
            $results[] = array("product_id"=>$request->product_id[$key],
            "quantity"=>$request->quantity[$key], "price"=>$request->price[$key]);
        }
        $purchase->purchaseDetails()->createMany($results);
        return redirect()->route('purchases.index');
    }


    public function show(Purchase $purchase)
    {
        return view('admin.purchase.show', compact('purchase'));
    }

    public function edit(Purchase $purchase)
    {
        $provider = Provider::get();
        return view('admin.purchase.show', compact('purchase'));
    }





    //Nahuelitoooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooo

    public function update(UpdateRequest $request, Purchase $purchase)
    {
      //$purchase->update($request->all());
      //return redirect()->route('Purchases.index');
    }


    public function destroy(Purchase $purchase)
    {
        //$purchase->delete();
    }
}
