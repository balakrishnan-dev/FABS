<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;

class CountryController extends Controller
{
    public function index(Request $request)
    {
        $countries = Country::when($request->search, function ($query) use ($request) {
            return $query->where('country_name', 'like', '%'.$request->search.'%')
            ->Orwhere('currency_name', 'like', '%'.$request->search.'%');
        })
        ->paginate(10);
    
        return view('countries.index', compact('countries'));
    }
    
    public function getCountries(Request $request)
    {
        if ($request->ajax()) {
            $data = Country::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('created_at', function ($row) {
                    return Carbon::parse($row->created_at)->diffForHumans();
                })
                ->editColumn('updated_at',function ($row){
                    return Carbon::parse($row->updated_at)->diffForHumans();
                })
                ->addColumn('action', function ($row) {
                    // Update the Edit button to redirect to the edit page
                    $editBtn = '<a href="' . route('countries.edit', $row->id) . '" class="btn btn-sm btn-success">Edit</a>';
                    $deleteBtn = '<button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteRecordModal" data-id="'.$row->id.'">Remove</button>';

                    return $editBtn . ' ' . $deleteBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function create(){
        return view('countries.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'country_name' => 'required|string|max:255',
            'currency_name' => 'required|string|max:255',
        ]);
    
        Country::create($request->all());
        return redirect()->route('countries.index')->with('success', 'Record added successfully!');
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
