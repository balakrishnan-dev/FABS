<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Process;

use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;

class ProcessController extends Controller
{
    public function index(Request $request)
    {
        $process = Process::when($request->search, function ($query) use ($request) {
            return $query->where('process_name', 'like', '%'.$request->search.'%')
            ->Orwhere('description', 'like', '%'.$request->search.'%')
            ->Orwhere('coolie_per_mtr', 'like', '%'.$request->search.'%');
        })
        ->paginate(10);
    
        if ($request->ajax()) {
            $view = view('process.partials.table_rows', compact('process'))->render();
            $pagination = $process->links()->toHtml();
            return response()->json(['tableRows' => $view, 'pagination' => $pagination]);
        }
    
        return view('process.index', compact('process'));
    }
    
    public function getProcess(Request $request)
    {
        if ($request->ajax()) {
            $data = Process::latest()->get();
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
                    $editBtn = '<a href="' . route('process.edit', $row->id) . '" class="btn btn-sm btn-success">Edit</a>';
                    $deleteBtn = '<button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteRecordModal" data-id="'.$row->id.'">Remove</button>';

                    return $editBtn . ' ' . $deleteBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function create(){
        return view('process.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'process_name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'coolie_per_mtr' => 'required|numeric|min:0',
        ]);
        Process::create($request->all());
        return redirect()->route('process.index')->with('success', 'Record added successfully!');
    }

    public function edit($id)
    {
        $process = Process::findOrFail($id);
        return view('process.edit', compact('process'));
    }
 
      
    public function update(Request $request, $id)
    {
        $process = Process::findOrFail($id);
        $process->update([
            'process_name' => $request->process_name,
            'description' => $request->description,
            'coolie_per_mtr' => $request->coolie_per_mtr
        ]);
        
        return redirect()->route('process.index')->with('success', 'Record updated successfully!');
    }

    public function destroy($id)
    {
        $process = Process::findOrFail($id);
        $process->delete();
        return response()->json(['success' => 'Record deleted successfully']);
    }
}
