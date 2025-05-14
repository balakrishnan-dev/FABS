<?php

namespace App\Http\Controllers;

use App\Models\LedgerMaster;
use App\Models\GroupMaster;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;

class LedgerMasterController extends Controller
{
    public function index()
    {
        return view('ledger-masters.index');
    }

            public function getData(Request $request)
    {
        $ledgers = LedgerMaster::with('group')->select('ledger_masters.*');

        return DataTables::of($ledgers)
            ->addIndexColumn()
            ->addColumn('group_name', function ($row) {
                return $row->group->group_name ?? ''; // Safe access
            })
            ->addColumn('created_at', function ($row) {
                return Carbon::parse($row->created_at)->diffForHumans(); // <-- Human-readable time
            })
            ->addColumn('updated_at', function ($row) {
                return Carbon::parse($row->updated_at)->diffForHumans(); // <-- Human-readable time
            })
            ->addColumn('action', function ($row) {
                $editUrl = route('ledger-masters.edit', $row->id);
                $btn = '<a href="' . $editUrl . '" class="btn btn-sm btn-success">Edit</a> ';
                $btn .= '<button type="button" class="btn btn-sm btn-danger" data-id="' . $row->id . '" data-bs-toggle="modal" data-bs-target="#deleteRecordModal">Delete</button>';
                return $btn;
            })
            ->rawColumns(['action']) // Allow raw HTML for toggle and buttons
            ->make(true);
    }

    public function create()
    {
        $groups = GroupMaster::all();
        return view('ledger-masters.create', compact('groups'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'ledger_name' => 'required',
            'group_id' => 'required|exists:group_masters,id',
            'opening_balance' => 'required|numeric',
            'balance_type' => 'required|in:Debit,Credit',
        ]);

        LedgerMaster::create([
            'ledger_name' => $request->ledger_name,
            'group_id' => $request->group_id,
            'opening_balance' => $request->opening_balance,
            'balance_type' => $request->balance_type,
        ]);

        return redirect()->route('ledger-masters.index')->with('success', 'Ledger created successfully.');
    }

    public function edit($id)
    {
        $ledger = LedgerMaster::findOrFail($id);
        $groups = GroupMaster::all();

        return view('ledger-masters.edit', compact('ledger', 'groups'));
    }

    public function update(Request $request, LedgerMaster $ledger_master)
    {
        $request->validate([
            'ledger_name' => 'required',
            'group_id' => 'required|exists:group_masters,id',
            'opening_balance' => 'required|numeric',
            'balance_type' => 'required|in:Debit,Credit',
        ]);

        $ledger_master->update([
            'ledger_name' => $request->ledger_name,
            'group_id' => $request->group_id,
            'opening_balance' => $request->opening_balance,
            'balance_type' => $request->balance_type,
        ]);

        return redirect()->route('ledger-masters.index')->with('success', 'Ledger updated successfully.');
    }

    public function destroy(LedgerMaster $ledger_master)
    {
        $ledger_master->delete();
        return response()->json(['success' => 'Ledger deleted successfully']);
    }

}   