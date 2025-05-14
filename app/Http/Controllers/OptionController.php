<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Option;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;

class OptionController extends Controller
{  public function index()
    {
        return view('options.index');
    }

public function getOptions(Request $request)
{
    if ($request->ajax()) {
        $data = Option::latest()->get();
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
            $editBtn = '<a href="' . route('options.edit', $row->id) . '" class="btn btn-sm btn-success">Edit</a>';
            $deleteBtn = '<button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteRecordModal" data-id="'.$row->id.'">Remove</button>';

            return $editBtn . ' ' . $deleteBtn;
        })
        ->rawColumns(['action'])
        ->make(true);
}
}



    public function create()
    {
        return view('options.create');
    }

    public function store(Request $request)
    {
        $request->validate(
            ['option_name' => 'required'],
            ['value' => 'required'],
        );
        Option::create($request->all());
        return redirect()->route('options.index')->with('success', 'Options created successfully.');
    }

    public function edit($id)
    {
        $options = Option::find($id);
        return view('options.edit', compact('options'));
    }

    public function update(Request $request, $id)
    {
        
        $options = Option::findOrFail($id);
        $options->update([
            'option_name' => $request->option_name,
            'value' => $request->value,
        ]);
        return redirect()->route('options.index')->with('success', 'Record updated successfully!');
    }

    public function destroy($id)
    {
        $options = Option::findOrFail($id);
        $options->delete();
    
        return response()->json(['success' => 'Deleted successfully']);
    }
    
}