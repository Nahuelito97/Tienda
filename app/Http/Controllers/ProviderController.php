<?php

namespace App\Http\Controllers;

use App\Provider;
use App\Http\Requests\Provider\StoreRequest;
use App\Http\Requests\Provider\UpdateRequest;

class ProviderController extends Controller
{
    public function index()
    {
        $providers = Provider::get();
        return view('admin.Provider.index', compact('providers'));

    }
//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

    public function create()
    {
        return view('admin.provider.create');
    }

    public function store(StoreRequest $request)
    {
        Provider::crate($request->all());
        return redirect()->route('provider.index');
    }


    public function show(Provider $provider)
    {
        return view('admin.provider.show', compact('provider'));
    }

    public function edit(Provider $provider)
    {
        return view('admin.provider.show', compact('provider'));
    }


    public function update(UpdateRequest $request, Provider $provider)
    {
      $provider->update($request->all());
      return redirect()->route('provider.index');
    }


    public function destroy(Provider $provider)
    {
        $provider->delete();
    }
}
