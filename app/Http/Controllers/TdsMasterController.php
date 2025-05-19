<?php

namespace App\Http\Controllers;

use App\Models\LedgerMaster;
use App\Models\BankMaster;
use App\Models\TdsMaster;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;

class TdsMasterController extends Controller
{
        public function index() {
        return view('tds-masters.index');
    }

    public function getTDS(Request $request)
{
    if ($request->ajax()) {
        $data = TdsMaster::with(['ledger', 'bank'])->latest()->get();

        return DataTables::of($data)
            ->addIndexColumn()

            ->editColumn('ledger_id', function ($row) {
                return $row->ledger->ledger_name ?? '-';
            })

            ->editColumn('bank_id', function ($row) {
                return $row->bank->bank_name ?? '-';
            })

            ->editColumn('date_from', function ($row) {
                return Carbon::parse($row->date_from)->format('d-m-Y');
            })

            ->editColumn('date_to', function ($row) {
                return Carbon::parse($row->date_to)->format('d-m-Y');
            })

            ->editColumn('created_at', function ($row) {
                return Carbon::parse($row->created_at)->diffForHumans();
            })

            ->editColumn('updated_at', function ($row) {
                return Carbon::parse($row->updated_at)->diffForHumans();
            })

            ->addColumn('action', function ($row) {
                $editBtn = '<a href="' . route('tds-masters.edit', $row->id) . '" class="btn btn-sm btn-success">Edit</a>';
                $deleteBtn = '<button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteRecordModal" data-id="' . $row->id . '">Remove</button>';
                return $editBtn . ' ' . $deleteBtn;
            })

            ->rawColumns(['action'])
            ->make(true);
    }
}

    public function create() {
        $ledgers = LedgerMaster::all();
        $banks = BankMaster::all();
        return view('tds-masters.create', compact('ledgers', 'banks'));
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
        $tdsMaster = TdsMaster::find($id);
        $ledgers = LedgerMaster::all();
        $banks = BankMaster::all();
        return view('tds-masters.edit', compact('tdsMaster','ledgers', 'banks'));
    }
 
      
    public function update(Request $request, $id)
    {
            $request->validate([
                'date_from'   => 'required|date',
                'date_to'     => 'required|date|after_or_equal:date_from',
                'ledger_id'   => 'required|exists:ledger_masters,id',
                'amount'      => 'nullable|numeric|min:0',
                'bill_no'     => 'nullable|string|max:255',
                'bank_id'     => 'nullable|exists:bank_masters,id',
                'type'        => 'nullable|string|max:100',
            ]);
            $tdsMaster = TdsMaster::findOrFail($id);

            $tdsMaster->update([
            'date_from'   => $request->date_from,
            'date_to'     => $request->date_to,
            'ledger_id'   => $request->ledger_id,
            'amount'      => $request->amount,
            'bill_no'     => $request->bill_no,
            'bank_id'     => $request->bank_id,
            'type'        => $request->type,
        ]);
        
        return redirect()->route('tds-masters.index')->with('success', 'Record updated successfully!');
    }

    public function destroy($id)
    {
        $tds = TdsMaster::findOrFail($id);
        $tds->delete();
        return response()->json(['success' => 'Record deleted successfully']);
    }
}
