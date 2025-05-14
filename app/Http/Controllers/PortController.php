<?php

namespace App\Http\Controllers;

use App\Models\Port;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;

class PortController extends Controller
{
    public function index()
    {
        return view('ports.index');
    }

    public function getPorts(Request $request)
    {
        if ($request->ajax()) {
            $data = Port::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('created_at', function ($row) {
                    return Carbon::parse($row->created_at)->diffForHumans();
                })
                ->editColumn('updated_at',function ($row){
                    return Carbon::parse($row->updated_at)->diffForHumans();
                })
                ->addColumn('action', function ($row) {
                    $editBtn = '<a href="' . route('ports.edit', $row->id) . '" class="btn btn-sm btn-success">Edit</a>';
                    $deleteBtn = '<button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteRecordModal" data-id="' . $row->id . '">Remove</button>';
                    return $editBtn . ' ' . $deleteBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
    



    public function create()
    {
        return view('ports.create');
    }

    public function store(Request $request)
    {
        $request->validate(['port_name' => 'required']);
        Port::create($request->all());
        return redirect()->route('ports.index')->with('success', 'Port created successfully.');
    }

    public function edit($id)
    {
        $port = Port::find($id);
        return view('ports.edit', compact('port'));
    }

    public function update(Request $request, $id)
    {
        
        $port = Port::findOrFail($id);
        $port->update([
            'port_name' => $request->port_name,
        ]);   
        return redirect()->route('ports.index')->with('success', 'Record updated successfully!');
    }

    public function destroy($id)
    {
        $port = Port::findOrFail($id);
        $port->delete();
    
        return response()->json(['success' => 'Deleted successfully']);
    }
    
}
