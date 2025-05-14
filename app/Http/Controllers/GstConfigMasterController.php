<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\GstConfigMaster;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;

class GstConfigMasterController extends Controller
{
    public function index(Request $request)
    {
        $gst_config = GstConfigMaster::when($request->search, function($query) use ($request){
            //  $query->where('gst_status', 'like', '%'.$request->search.'%')
            return $query->where('gst_percentage', 'like', '%'.$request->search. '%');
        })
        ->paginate(10);
        
        if ($request->ajax()) {
            $view = view('ports.partials.table_rows', compact('ports'))->render();
            $pagination = $ports->links()->toHtml();
            return response()->json(['tableRows' => $view, 'pagination' => $pagination]);
        }
    
        return view('gst-config-masters.index', compact('gst_config'));
    }

    public function create(){
        return view('gst-config-masters.create');
    }

public function updateStatus(Request $request, $id)
{
    $gst = GstConfigMaster::findOrFail($id);
    $gst->gst_status = $request->status;
    $gst->save();

    return response()->json([
        'message' => 'GST status updated to ' . ucfirst($request->status),
    ]);
}

    
    public function getGsts(Request $request)
    {
        if ($request->ajax()) {
            $data = GstConfigMaster::latest()->get();
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
                    $editBtn = '<a href="' . route('gst-config-masters.edit', $row->id) . '" class="btn btn-sm btn-success">Edit</a>';
                    $deleteBtn = '<button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteRecordModal" data-id="'.$row->id.'">Remove</button>';

                    return $editBtn . ' ' . $deleteBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            // 'gst_status' => 'required|in:Approved,Rejected',
            'gst_percentage' => 'required|numeric'
        ]);

        GstConfigMaster::create($request->all());
        return redirect()->route('gst-config-masters.index')->with('success' , 'Record added successfully');
    }



    
    public function edit($id)
    {
        $gstConfig = GstConfigMaster::findOrFail($id);
        return view('gst-config-masters.edit', compact('gstConfig'));
    }
 
      

    public function update(Request $request, $id)
    {
        $gstConfig = GstConfigMaster::findOrFail($id);
        $gstConfig->update($request->all());
        return redirect()->route('gst-config-masters.index')->with('success' , 'Record updated successfully');
    }

    public function destroy($id)
    {
        $gstConfig = GstConfigMaster::findOrFail($id);
        $gstConfig->delete();
        return response()->json(['success' => 'Record deleted successfully']);
    }
}
