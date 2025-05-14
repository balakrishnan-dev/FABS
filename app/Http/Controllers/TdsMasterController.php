<?php

namespace App\Http\Controllers;

use App\Models\Ledger;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;

class TdsMasterController extends Controller
{
        public function index() {
        return view('tds_masters.index');
    }

    public function getData(Request $request) {
        $data = TdsMaster::with(['ledger', 'bank'])->latest()->get();
        return DataTables::of($data)
            ->addIndexColumn()
            ->editColumn('date_from', fn($row) => $row->date_from->format('d-m-Y'))
            ->editColumn('date_to', fn($row) => $row->date_to->format('d-m-Y'))
            ->addColumn('ledger_name', fn($row) => $row->ledger->ledger_name ?? '-')
            ->addColumn('bank_name', fn($row) => $row->bank->bank_name ?? '-')
            ->addColumn('action', fn($row) => '<a href="'.route('tds-masters.edit', $row->id).'" class="btn btn-sm btn-primary">Edit</a>')
            ->rawColumns(['action'])
            ->make(true);
    }

    public function create() {
        $ledgers = LedgerMaster::all();
        $banks = BankMaster::all();
        return view('tds_masters.create', compact('ledgers', 'banks'));
    }

    public function store(Request $request) {
        $request->validate([
            'date_from' => 'required|date',
            'date_to' => 'required|date',
            'ledger_id' => 'required|exists:ledger_masters,id',
            'amount' => 'required|numeric',
            'bill_no' => 'required|string',
            'bank_id' => 'required|exists:bank_masters,id',
            'type' => 'required|string'
        ]);
        TdsMaster::create($request->all());
        return redirect()->route('tds-masters.index')->with('success', 'TDS record created.');
    }


    public function edit($id)
    {
        $country = Country::findOrFail($id);
        return view('countries.edit', compact('country'));
    }
 
      
    public function update(Request $request, $id)
    {
        $country = Country::findOrFail($id);
        $country->update([
            'country_name' => $request->country_name,
            'currency_name' => $request->currency_name,
        ]);
        
        return redirect()->route('countries.index')->with('success', 'Record updated successfully!');
    }

    public function destroy($id)
    {
        $country = Country::findOrFail($id);
        $country->delete();
        return response()->json(['success' => 'Country deleted successfully']);
    }
}
