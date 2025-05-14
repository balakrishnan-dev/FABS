<?php

namespace App\Http\Controllers;

use App\Models\LoomType;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;

class LoomTypeController extends Controller
{
    // Display index view with DataTable
    public function index(Request $request)
    {
        return view('loom_types.index');
    }

    // API endpoint for DataTable AJAX call
    public function getData(Request $request)
    {
        if ($request->ajax()) {
            $data = LoomType::latest()->get();
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
                $editBtn = '<a href="' . route('loom-types.edit', $row->id) . '" class="btn btn-sm btn-success">Edit</a>';
                $deleteBtn = '<button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteRecordModal" data-id="'.$row->id.'">Remove</button>';
    
                return $editBtn . ' ' . $deleteBtn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }
    }

    public function create(){
        return view('loom_types.create');
    }

    // Store or update a Loom Type
    public function store(Request $request)
    {
        $request->validate([
            'loom_type' => 'required|unique:loom_types,loom_type',
            'order_type' => 'required',
            'weaving_type' => 'required'
        ]);
    
        LoomType::create($request->all());
    
        return redirect()->route('loom-types.index')->with('success', 'Record created successfully.');
    }
    
    // Edit form data (returns JSON)
    public function edit($id)
    {
        $loomType = LoomType::findOrFail($id);
        return view('loom_types.edit',compact('loomType'));
    }

    // Update via full form (if needed for non-AJAX)
    public function update(Request $request, $id)
    {
        $request->validate([
            'loom_type' => 'required|string|max:255|unique:loom_types,loom_type,' . $id,
            'order_type' => 'required|string|max:255',
            'weaving_type' => 'required|string|max:255',
        ]);
    
        $loomType = LoomType::findOrFail($id);
        $loomType->update([
            'loom_type' => $request->loom_type,
            'order_type' => $request->order_type,
            'weaving_type' => $request->weaving_type,

        ]);
    
        return redirect()->route('loom-types.index')->with('success', 'Record updated successfully.');
    }
    
    
    // Delete a loom type
    public function destroy($id)
    {
        LoomType::findOrFail($id)->delete();
        return response()->json(['success' => 'Loom Type deleted successfully.']);
    }
}
