<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Company;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;

class CompanyController extends Controller
{
    public function index()
    {
        return view('companies.index');
    }

    public function getCompanies(Request $request)
    {
        if ($request->ajax()) {
            $data = Company::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('created_at', function ($row) {
                    return Carbon::parse($row->created_at)->diffForHumans();
                })
                ->editColumn('updated_at', function ($row) {
                    return Carbon::parse($row->updated_at)->diffForHumans();
                })
                ->addColumn('action', function ($row) {
                    $editBtn = '<a href="' . route('companies.edit', $row->id) . '" class="btn btn-sm btn-success">Edit</a>';
                    $deleteBtn = '<button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteRecordModal" data-id="' . $row->id . '">Remove</button>';
                    return $editBtn . ' ' . $deleteBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function create()
    {
        return view('companies.create');
    }

public function store(Request $request)
{
    // Validate the incoming request data, including the new fields
       $validated = $request->validate([
        'financial_year_from' => 'required|date',
        'financial_year_to' => 'required|date',
        'company_name' => 'required|string|max:255',
        'nature_of_business' => 'required|string|max:255',
        'address' => 'required|string',
        'place' => 'required|string|max:255',
        'pin' => 'required|string|max:20',
        'std' => 'required|string|max:20',
        'phone_no' => 'required|string|max:20',
        'fax' => 'required|string|max:20',
        'tel' => 'required|string|max:20',
        'income_tax_no' => 'required|string|max:50',
        'sales_tax_no' => 'required|string|max:50',
        'cst_no' => 'required|string|max:50',
        'password' => 'required|string|min:8',
        'short_name' => 'required|string|max:50',
        'email' => 'required|email|max:255',
        'tin_no' => 'required|string|max:50',
        'ecc_no' => 'required|string|max:50',
        'cerc_no' => 'required|string|max:50',
        'range' => 'required|string|max:50',
        'division' => 'required|string|max:50',
        'commission_rate' => 'required|numeric|max:9999999.9999',
        'location_code_no' => 'required|string|max:50',
        'pan_no' => 'required|string|max:50',
        'default_year' => 'required|string|max:4',
        'remarks' => 'required|string',
        'types' => 'required|in:single,many',
    ]);

    // Create the company record
    Company::create($validated);

    // Redirect to the companies index route with a success message
   // If AJAX, return JSON
    if ($request->ajax()) {
        return response()->json(['success' => true, 'message' => 'Company created successfully']);
    }

    return redirect()->route('companies.index')->with('success', 'Company created successfully');
}
    
  public function edit($id)
{
    // Find the company by its ID
    $company = Company::findOrFail($id);

    // Return the edit view with the company data
    return view('companies.edit', compact('company'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'company_name' => 'required|string|max:255',
        'nature_of_business' => 'required|string|max:255',
        'address' => 'required|string|max:255',
        'place' => 'required|string|max:100',
        'pin' => 'required|string|max:10',
        'std' => 'required|string|max:10',
        'phone_no' => 'required|string|max:15',
        'fax' => 'required|string|max:15',
        'tel' => 'required|string|max:15',
        'income_tax_no' => 'required|string|max:50',
        'sales_tax_no' => 'required|string|max:50',
        'cst_no' => 'required|string|max:50',
        'password' => 'required|string|min:6',
        'short_name' => 'required|string|max:50',
        'financial_year_from' => 'required|date',
        'financial_year_to' => 'required|date',
        'email' => 'required|email|max:255',
        'tin_no' => 'required|string|max:50',
        'ecc_no' => 'required|string|max:50',
        'cerc_no' => 'required|string|max:50',
        'range' => 'required|string|max:50',
        'division' => 'required|string|max:50',
        'commission_rate' => 'required',
        'location_code_no' => 'nullable|string|max:50',
        'pan_no' => 'required|string|max:20',
        'default_year' => 'required|string|max:20',
        'remarks' => 'required|string|max:500',
        'types' => 'required|in:single,many',
    ]);

    $company = Company::findOrFail($id);
    $company->update($request->all());

    return redirect()->route('companies.index')->with('success', 'Company updated successfully!');
}

    public function destroy($id)
    {
        $company = Company::findOrFail($id);
        $company->delete();

        return response()->json(['success' => 'Deleted successfully']);
    }
}
