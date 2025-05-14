<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\YearMaster;
use Carbon\Carbon;
use Yajra\DataTables\DataTables;

class YearMasterController extends Controller
{
    // Display the list of years
    public function index(Request $request)
    {
        $years = YearMaster::when($request->search, function ($query) use ($request) {
            return $query->where('year_name', 'like', '%'.$request->search.'%');
        })->paginate(10);

        return view('year_masters.index', compact('years'));
    }
    
    // Fetch data for DataTables
    public function getYear(Request $request)
    {
        if ($request->ajax()) {
            $data = YearMaster::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('created_at', function ($row) {
                    return Carbon::parse($row->created_at)->diffForHumans();
                })
                ->editColumn('updated_at', function ($row) {
                    return Carbon::parse($row->updated_at)->diffForHumans();
                })
                ->addColumn('action', function ($row) {
                    $editBtn = '<a href="' . route('year.edit', $row->id) . '" class="btn btn-sm btn-success">Edit</a>';
                    $deleteBtn = '<button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteRecordModal" data-id="'.$row->id.'">Remove</button>';

                    return $editBtn . ' ' . $deleteBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    // Show the form to create a new year
    public function create()
    {
        return view('year_masters.create');
    }

    // Store a new year record
    public function store(Request $request)
    {
        $request->validate([
            'year_name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        YearMaster::create($request->only(['year_name', 'start_date', 'end_date']));

        return redirect()->route('year.index')->with('success', 'Year added successfully.');
    }

    // Show the form to edit an existing year
    public function edit($id)
    {
        $year = YearMaster::findOrFail($id);

        return view('year_masters.edit', compact('year'));
    }

    // Update the year record
    public function update(Request $request, $id)
    {
        $request->validate([
            'year_name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $year = YearMaster::findOrFail($id);
        $year->update([
            'year_name' => $request->year_name,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        return redirect()->route('year.index')->with('success', 'Year updated successfully.');
    }

    // Delete a year record
    public function destroy($id)
    {
        $year = YearMaster::findOrFail($id);
        $year->delete();
        
        return response()->json(['success' => 'Year deleted successfully']);
    }
}
