<?php

namespace App\Http\Controllers;

use App\Models\AdjustmentEntry;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;

class AdjustmentEntryController extends Controller
{
    public function index(Request $request)
    {
        return view('adjustments.index');
    }

    public function getAdjustments(Request $request)
    {
        if ($request->ajax()) {
            $data = AdjustmentEntry::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('date', function ($row) {
                    return Carbon::parse($row->date)->format('d-m-Y');
                })
                ->editColumn('amount', function ($row) {
                    return number_format($row->amount, 2);
                })
                ->editColumn('created_at', function ($row) {
                    return Carbon::parse($row->created_at)->diffForHumans();
                })
                ->addColumn('action', function ($row) {
                    $editBtn = '<a href="' . route('adjustments.edit', $row->id) . '" class="btn btn-sm btn-success">Edit</a>';
                    $deleteBtn = '<button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteRecordModal" data-id="'.$row->id.'">Remove</button>';
                    return $editBtn . ' ' . $deleteBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function create()
    {
        return view('adjustments.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'ledger' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'type' => 'required|in:debit,credit',
            'note' => 'nullable|string',
        ]);

        AdjustmentEntry::create($request->all());
        return redirect()->route('adjustments.index')->with('success', 'Adjustment entry added successfully!');
    }

    public function edit($id)
    {
        $adjustment = AdjustmentEntry::findOrFail($id);
        return view('adjustments.edit', compact('adjustment'));
    }

    public function update(Request $request, $id)
    {
        $adjustment = AdjustmentEntry::findOrFail($id);
        $request->validate([
            'date' => 'required|date',
            'ledger' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'type' => 'required|in:debit,credit',
            'note' => 'nullable|string',
        ]);

        $adjustment->update($request->all());
        return redirect()->route('adjustments.index')->with('success', 'Adjustment entry updated successfully!');
    }

    public function destroy($id)
    {
        $adjustment = AdjustmentEntry::findOrFail($id);
        $adjustment->delete();
        return response()->json(['success' => 'Adjustment entry deleted successfully']);
    }
}
