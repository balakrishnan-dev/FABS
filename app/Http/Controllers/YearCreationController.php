<?php

namespace App\Http\Controllers;

use App\Models\YearCreation;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;

class YearCreationController extends Controller
{
    public function index()
    {
        return view('year_creations.index');
    }

    public function getyear_creations(Request $request)
    {
        if ($request->ajax()) {
            $data = YearCreation::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('created_at', function ($row) {
                    return Carbon::parse($row->created_at)->diffForHumans();
                })
                ->editColumn('updated_at',function ($row){
                    return Carbon::parse($row->updated_at)->diffForHumans();
                })
                ->addColumn('action', function ($row) {
                    $editBtn = '<a href="' . route('year_creations.edit', $row->id) . '" class="btn btn-sm btn-success">Edit</a>';
                    $deleteBtn = '<button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteRecordModal" data-id="' . $row->id . '">Remove</button>';
                    return $editBtn . ' ' . $deleteBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
    



    public function create()
    {
        return view('year_creations.create');
    }

    public function store(Request $request)
    {
         $request->validate([
            'company_name' => 'required|string|max:255',
            'no_of_business' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'place' => 'required|string|max:255',
            'pin' => 'required|string|max:255',
            'std' => 'nullable|string|max:255',
            'phone_no' => 'nullable|string|max:15',
            'fax' => 'nullable|string|max:15',
            'email' => 'nullable|email|max:255',
            'inc_tax_pan_no' => 'nullable|string|max:255',
            'pin_no' => 'nullable|string|max:255',
            'cst_no' => 'nullable|string|max:255',
            'ecc_no' => 'nullable|string|max:255',
            'cerc_no' => 'nullable|string|max:255',
            'range' => 'nullable|string|max:255',
            'division' => 'nullable|string|max:255',
            'commission_rate' => 'nullable|numeric',
            'location_date' => 'nullable|date',
        ]);

        YearCreation::create($request->all());
        return redirect()->route('year_creations.index')->with('success', 'year_creations created successfully.');
    }

    public function edit($id)
    {
        $yearCreation = YearCreation::find($id);
        return view('year_creations.edit', compact('yearCreation'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'company_name' => 'required|string|max:255',
            'no_of_business' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'place' => 'required|string|max:255',
            'pin' => 'required|string|max:255',
            'std' => 'nullable|string|max:255',
            'phone_no' => 'nullable|string|max:15',
            'fax' => 'nullable|string|max:15',
            'email' => 'nullable|email|max:255',
            'inc_tax_pan_no' => 'nullable|string|max:255',
            'pin_no' => 'nullable|string|max:255',
            'cst_no' => 'nullable|string|max:255',
            'ecc_no' => 'nullable|string|max:255',
            'cerc_no' => 'nullable|string|max:255',
            'range' => 'nullable|string|max:255',
            'division' => 'nullable|string|max:255',
            'commission_rate' => 'nullable|numeric',
            'location_date' => 'nullable|date',
        ]);

        $yearCreation = YearCreation::findOrFail($id);
        $yearCreation->update($request->all());

        return redirect()->route('year_creations.index')->with('success', 'Year Creation updated successfully.');
    }

    public function destroy($id)
    {
        $year_creations = YearCreation::findOrFail($id);
        $year_creations->delete();
    
        return response()->json(['success' => 'Deleted successfully']);
    }
    
}
