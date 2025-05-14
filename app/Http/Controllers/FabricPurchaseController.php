<?php

namespace App\Http\Controllers;

use App\Models\FabricPurchase;
use Illuminate\Http\Request;
use Carbon\Carbon;

class FabricPurchaseController extends Controller
{
    public function index()
    {
        return view('fabric_purchases.index', ['fabricPurchases' => FabricPurchase::all()]);
    }

    public function create()
    {
        return view('fabric_purchases.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'supplier_name' => 'required|string',
            'fabric_type' => 'required|string',
            'purchase_date' => 'required|date',
            'quantity' => 'required|integer',
            'rate' => 'required|numeric',
        ]);
        $data['total_cost'] = $data['quantity'] * $data['rate'];

        FabricPurchase::create($data);

        return redirect()->route('fabric_purchases.index')->with('success', 'Fabric Purchase added.');
    }

    public function edit(FabricPurchase $fabricPurchase)
    {
        return view('fabric_purchases.edit', compact('fabricPurchase'));
    }

    public function update(Request $request, FabricPurchase $fabricPurchase)
    {
        $data = $request->validate([
            'supplier_name' => 'required|string',
            'fabric_type' => 'required|string',
            'purchase_date' => 'required|date',
            'quantity' => 'required|integer',
            'rate' => 'required|numeric',
        ]);
        $data['total_cost'] = $data['quantity'] * $data['rate'];

        $fabricPurchase->update($data);

        return redirect()->route('fabric_purchases.index')->with('success', 'Fabric Purchase updated.');
    }

    public function destroy(FabricPurchase $fabricPurchase)
    {
        $fabricPurchase->delete();
        return redirect()->route('fabric_purchases.index')->with('success', 'Fabric Purchase deleted.');
    }
}
