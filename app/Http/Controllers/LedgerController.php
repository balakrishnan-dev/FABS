<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ledger;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;

class LedgerController extends Controller
{
    // Index method to return the main page view
    public function index()
    {
        return view('ledgers.index');
    }

    // Fetch Ledger for DataTables (AJAX request)
    public function getLedgers(Request $request)
    {
        if ($request->ajax()) {
            $data = Ledger::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('created_at', function ($row) {
                    return Carbon::parse($row->created_at)->diffForHumans();
                })
                ->editColumn('updated_at',function ($row){
                    return Carbon::parse($row->updated_at)->diffForHumans();
                })
                ->addColumn('action', function ($row) {
                    // Edit button (redirect to edit page)
                    $editBtn = '<a href="' . route('ledgers.edit', $row->id) . '" class="btn btn-sm btn-success">Edit</a>';
                    // Delete button with modal
                    $deleteBtn = '<button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteRecordModal" data-id="' . $row->id . '">Remove</button>';
                    return $editBtn . ' ' . $deleteBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    // Show the create form for ledgers
    public function create()
    {
        return view('ledgers.create');
    }

    // Store a newly created ledgers
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:ledgers,name',
        ]);

        Ledger::create($request->all());

        return redirect()->route('ledgers.index')->with('success', 'Ledger created successfully.');
    }

    // Show the edit form for a specific ledgers
    public function edit($id)
    {
        $ledgers = Ledger::find($id);
        return view('ledgers.edit', compact('ledgers'));
    }

    // Update an existing ledgers
    public function update(Request $request, $id)
    {
        $ledgers = Ledger::findOrFail($id);

        // Validate the input data
        $request->validate([
            'name' => 'required|unique:ledgers,name',
        ]);



        // Update the ledgers record
        $ledgers->update($request->all());

        return redirect()->route('ledgers.index')->with('success', 'Ledger updated successfully.');
    }

    // Delete a specific ledgers
    public function destroy($id)
    {
        $ledgers = Ledger::findOrFail($id);
        $ledgers->delete();

        return response()->json(['success' => 'Ledger deleted successfully.']);
    }
}
