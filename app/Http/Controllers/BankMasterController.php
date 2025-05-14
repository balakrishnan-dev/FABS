<?php

namespace App\Http\Controllers;

use App\Models\BankMaster;
use App\Models\LedgerMaster;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;

class BankMasterController extends Controller
{
    public function index()
    {
        return view('bank_masters.index');
    }

    public function getData(Request $request)
    {
        if ($request->ajax()) {
            $data = BankMaster::with('ledger')->latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('ledger_name', fn($row) => $row->ledger->ledger_name ?? '-')
                ->editColumn('created_at', fn($row) => Carbon::parse($row->created_at)->diffForHumans())
                ->editColumn('updated_at', fn($row) => Carbon::parse($row->updated_at)->diffForHumans())
                
                ->addColumn('action', function ($row) {
                    return '
                        <a href="' . route('bank-masters.edit', $row->id) . '" class="btn btn-sm btn-success">Edit</a>
                        <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteRecordModal" data-id="' . $row->id . '">Remove</button>
                    ';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

  
    public function create()
    {
        $ledgers = LedgerMaster::all(); // Fetch all ledgers
        return view('bank_masters.create', compact('ledgers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'bank_name' => 'required',
            'account_number' => 'required'
        ]);

        BankMaster::create($request->all());
        return redirect()->route('bank-masters.index')->with('success', 'Bank created successfully.');
    }

    public function edit(BankMaster $bankMaster)
    {
        $ledgers = LedgerMaster::all();
        return view('bank_masters.edit', compact('bankMaster', 'ledgers'));
    }
    public function update(Request $request, BankMaster $bankMaster)
    {
        $request->validate([
            'bank_name' => 'required',
            'account_number' => 'required'
        ]);

        $bankMaster->update($request->all());
        return redirect()->route('bank-masters.index')->with('success', 'Bank updated successfully.');
    }

    public function destroy(BankMaster $bankMaster)
    {
        $bankMaster->delete();
        return response()->json(['success' => 'Deleted successfully']);
    }
}
