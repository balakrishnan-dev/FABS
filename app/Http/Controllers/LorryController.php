<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lorry;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;


class LorryController extends Controller
{
    public function index()
    {
        return view('lorries_masters.index');
    }

    public function getData(Request $request){
    if($request->ajax()){
        $data = Lorry::latest()->get();
        return DataTables::of($data)
            ->addIndexColumn()
            ->editColumn('created_at', function ($row) {
                return Carbon::parse($row->created_at)->diffForHumans();
            })
            ->editColumn('updated_at', function ($row) {
                return Carbon::parse($row->updated_at)->diffForHumans();
            })
            ->addColumn('action', function ($row) {
                $editBtn = '<a href="' . route('lorries_masters.edit', $row->id) . '" class="btn btn-sm btn-success">Edit</a>';
                $deleteBtn = '<button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteRecordModal" data-id="'.$row->id.'">Remove</button>';
                return $editBtn . ' ' . $deleteBtn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    return response()->json(['message' => 'Bad Request'], 400);
}



    public function create()
    {
        return view('lorries_masters.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'loom_type' => 'required',
            'sales_no' => 'required',
            'no_value' => 'nullable|integer',
            'date' => 'required|date',
            'party_name' => 'required|string|max:255',
            'place_name' => 'required|string|max:255',
            'attn' => 'required|string|max:255',
            'GRN_no' => 'required|string|max:255',
        ]);

        Lorry::create($request->all());

        return redirect()->route('lorries_masters.index')->with('success', 'Record created successfully.');
    }

    public function edit($id)
    {
        $Lorry = Lorry::findOrFail($id);
        return view('lorries_masters.edit', compact('Lorry'));
    }


    public function update(Request $request, $id)
    {
        $Lorry = Lorry::findOrFail($id);

        $request->validate([
            'loom_type' => 'required',
            'sales_no' => 'required',
            'no_value' => 'nullable|integer',
            'date' => 'required|date',
            'party_name' => 'required|string|max:255',
            'place_name' => 'required|string|max:255',
            'attn' => 'required|string|max:255',
            'GRN_no' => 'required|string|max:255',
        ]);

        $Lorry->update($request->only([
            'loom_type',
            'sales_no',
            'no_value',
            'date',
            'party_name',
            'place_name',
            'attn',
            'GRN_no'
        ]));

        return redirect()->route('lorries_masters.index')->with('success', 'Record updated successfully.');
    }

    public function destroy($id)
    {
        
        $Lorry = Lorry::findOrFail($id);
        $Lorry->delete();
        return response()->json(['success' => 'Record deleted Sucessfully']);
    }
}
