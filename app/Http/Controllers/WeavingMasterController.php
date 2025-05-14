<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WeavingMaster;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;

class WeavingMasterController extends Controller
{
    public function index()
    {
        $weavings = WeavingMaster::latest()->get();
        return view('weaving-masters.index', compact('weavings'));
    }
    
    
    public function getData(Request $request)
    {
     
            if ($request->ajax()) {
                $data = WeavingMaster::latest()->get();
                return DataTables::of($data)
                    ->addIndexColumn()
                    ->editColumn('created_at', function ($row) {
                        return Carbon::parse($row->created_at)->diffForHumans();
                    })
                    ->editColumn('updated_at',function ($row){
                        return Carbon::parse($row->updated_at)->diffForHumans();
                    })
                    ->addColumn('action', function ($row) {
                        $editBtn = '<a href="' . route('weaving-masters.edit', $row->id) . '" class="btn btn-sm btn-success">Edit</a>';
                        $deleteBtn = '<button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteRecordModal" data-id="' . $row->id . '">Remove</button>';
                        return $editBtn . ' ' . $deleteBtn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }
        }
        

    
    public function create()
    {
        return view('weaving-masters.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'design_name' => 'required',
            'cl_no' => 'required',
            'party_name' => 'required',
            'shade' => 'required',
            'weaving_date' => 'nullable|date',
        ]);

        WeavingMaster::create($request->all());
        return redirect()->route('weaving-masters.index')->with('success', 'Weaving Master created successfully.');
    }

    public function edit(WeavingMaster $weaving_master)
    {
        return view('weaving-masters.edit', compact('weaving_master'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'design_name' => 'required',
            'cl_no' => 'required',
            'party_name' => 'required',
            'shade' => 'required',
            'weaving_date' => 'nullable|date',
        ]);

        $weaving = WeavingMaster::findOrFail($id);
        $weaving->update($request->all());
        return redirect()->route('weaving-masters.index')->with('success', 'Weaving Master updated successfully.');
    }
    

    public function destroy($id)
    {
        $port = WeavingMaster::findOrFail($id);
        $port->delete();
    
        return response()->json(['success' => 'Deleted successfully']);
    }
}
