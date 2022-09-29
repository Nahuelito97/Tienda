<?php

namespace App\Http\Controllers;

use App\Purchase;
use App\Http\Requests\Purchase\StoreRequest;
use App\Http\Requests\Purchase\UpdateRequest;
use App\Provider;

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
        $purchase = Purchase::crate($request->all());
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


    public function update(UpdateRequest $request, Purchase $purchase)
    {
      $purchase->update($request->all());
      return redirect()->route('Purchases.index');
    }


    public function destroy(Purchase $Purchase)
    {
        $Purchase->delete();
    }
}
