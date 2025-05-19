<?php

namespace App\Http\Controllers;

use App\Models\PackingSlip;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;


class PackingSlipController extends Controller
{
    public function index()
    {
        return view('packing_slips.index');
    }

    public function getData(Request $request){
    if($request->ajax()){
        $data = PackingSlip::latest()->get();
        return DataTables::of($data)
            ->addIndexColumn()
            ->editColumn('created_at', function ($row) {
                return Carbon::parse($row->created_at)->diffForHumans();
            })
            ->editColumn('updated_at', function ($row) {
                return Carbon::parse($row->updated_at)->diffForHumans();
            })
            ->addColumn('action', function ($row) {
                $editBtn = '<a href="' . route('packing_slips.edit', $row->id) . '" class="btn btn-sm btn-success">Edit</a>';
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
        return view('packing_slips.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'loom_type' => 'required',
            'order_type' => 'required',
            'no' => 'required',
            'no_value' => 'nullable|integer',
            'date' => 'required|date',
            'party_name' => 'required|string|max:255',
            'place_name' => 'required|string|max:255',
        ]);

        PackingSlip::create($request->all());

        return redirect()->route('packing_slips.index')->with('success', 'Record created successfully.');
    }

    public function edit($id)
    {
        $packingSlip = PackingSlip::findOrFail($id);
        return view('packing_slips.edit', compact('packingSlip'));
    }


    public function update(Request $request, $id)
    {
        $packingSlip = PackingSlip::findOrFail($id);

        $request->validate([
            'loom_type' => 'required',
            'order_type' => 'required',
            'no' => 'required',
            'no_value' => 'nullable|integer',
            'date' => 'required|date',
            'party_name' => 'required|string|max:255',
            'place_name' => 'required|string|max:255',
        ]);

        $packingSlip->update($request->only([
            'loom_type',
            'order_type',
            'no',
            'no_value',
            'date',
            'party_name',
            'place_name'
        ]));

        return redirect()->route('packing_slips.index')->with('success', 'Record updated successfully.');
    }

    public function destroy($id)
    {
        
        $packingSlip = PackingSlip::findOrFail($id);
        $packingSlip->delete();
        return response()->json(['success' => 'Record deleted Sucessfully']);
    }
  
}
