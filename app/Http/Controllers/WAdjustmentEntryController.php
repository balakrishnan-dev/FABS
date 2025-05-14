<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WAdjustmentEntry;
use App\Models\Ledger;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;


class WAdjustmentEntryController extends Controller
{
    // Show all entries
    public function index()
    {
        $ledgers = Ledger::all();
        return view('w_adjustments.index', compact('ledgers'));
    }

    // Show form to create a new entry
    public function create()
    {
        $ledgers = Ledger::all();
        return view('w_adjustments.create', compact('ledgers'));
    }

    // Store new entry
  public function store(Request $request)
{
    $validated = $request->validate([
        'ledger_id' => 'required|exists:ledgers,id',
        'date' => 'required|date',
        'amount' => 'required|numeric',
        'type' => 'required|string|in:credit,debit',  // Assuming 'credit' or 'debit' for the type
        'note' => 'nullable|string',
    ]);

    WAdjustmentEntry::create($validated);

    return redirect()->route('w-adjustment.index')->with('success', 'W Adjustment Entry created successfully.');
}

    // Fetch data for DataTables
public function getwAdjustments(Request $request)
{
    if ($request->ajax()) {
        $data = WAdjustmentEntry::with('ledger')->latest()->get();

        return DataTables::of($data)
            ->addIndexColumn()
            ->editColumn('ledger_id', function ($row) {
                return $row->ledger ? $row->ledger->name : '-';
            })
            ->editColumn('date', function ($row) {
                return \Carbon\Carbon::parse($row->date)->format('d-m-Y');
            })
            ->editColumn('created_at', function ($row) {
                return \Carbon\Carbon::parse($row->created_at)->diffForHumans();
            })
            ->editColumn('updated_at', function ($row) {
                return \Carbon\Carbon::parse($row->updated_at)->diffForHumans();
            })
            ->addColumn('action', function ($row) {
                $editBtn = '<a href="' . route('w-adjustment.edit', $row->id) . '" class="btn btn-sm btn-success">Edit</a>';
                $deleteBtn = '<button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteRecordModal" data-id="' . $row->id . '">Remove</button>';
                return $editBtn . ' ' . $deleteBtn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}

    

// Show edit form
public function edit($id)
{
    $entry = WAdjustmentEntry::findOrFail($id);
    $ledgers = Ledger::all();
    return view('w_adjustments.edit', compact('entry', 'ledgers'));
}

// Update the entry
public function update(Request $request, $id)
{
    $validated = $request->validate([
        'ledger_id' => 'required|exists:ledgers,id',
        'date' => 'required|date',
        'amount' => 'required|numeric',
        'type' => 'required|string|in:credit,debit',
        'note' => 'nullable|string',
    ]);

    $entry = WAdjustmentEntry::findOrFail($id);
    $entry->update($validated);

    return redirect()->route('w-adjustment.index')->with('success', 'W Adjustment Entry updated successfully.');
}

    // Delete the entry
    public function destroy($id)
    {
        $entry = WAdjustmentEntry::findOrFail($id);
        $entry->delete();

        return response()->json(['success' => 'Entry deleted successfully']);
    }

    // Filter by date range and ledger
    public function filter(Request $request)
    {
        $request->validate([
            'ledger_id' => 'required|exists:ledgers,id',
            'from_date' => 'required|date',
            'to_date' => 'required|date|after_or_equal:from_date',
        ]);

        $entries = WAdjustmentEntry::with('ledger')
            ->where('ledger_id', $request->ledger_id)
            ->whereBetween('date', [$request->from_date, $request->to_date])
            ->orderBy('date')
            ->get();

        return response()->json($entries);
    }
}
