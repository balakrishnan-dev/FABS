<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Narration;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;

class NarrationController extends Controller
{  public function index()
    {
        return view('narrations.index');
    }

public function getNarrations(Request $request)
{
    if ($request->ajax()) {
        $data = Narration::latest()->get();
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
            $editBtn = '<a href="' . route('narrations.edit', $row->id) . '" class="btn btn-sm btn-success">Edit</a>';
            $deleteBtn = '<button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteRecordModal" data-id="'.$row->id.'">Remove</button>';

            return $editBtn . ' ' . $deleteBtn;
        })
        ->rawColumns(['action'])
        ->make(true);
}
}



    public function create()
    {
        return view('narrations.create');
    }

    public function store(Request $request)
    {
        $request->validate(['narration_name' => 'required']);
        Narration::create($request->all());
        return redirect()->route('narrations.index')->with('success', 'Narrations created successfully.');
    }

    public function edit($id)
    {
        $narrations = Narration::find($id);
        return view('narrations.edit', compact('narrations'));
    }

    public function update(Request $request, $id)
    {
        
        $narrations = Narration::findOrFail($id);
        $narrations->update([
            'narration_name' => $request->narration_name,
        ]);
        return redirect()->route('narrations.index')->with('success', 'Record updated successfully!');
    }

    public function destroy($id)
    {
        $narrations = Narration::findOrFail($id);
        $narrations->delete();
    
        return response()->json(['success' => 'Deleted successfully']);
    }
    
}