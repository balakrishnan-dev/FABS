<?php

namespace App\Http\Controllers;

use App\Models\DyerOpening;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DyerOpeningController extends Controller
{
    public function index(Request $request)
    {
        $dyer_openings = DyerOpening::when($request->search, function ($query) use ($request) {
            return $query->where('dyer_name', 'like', '%'.$request->search.'%')
            ->Orwhere('place', 'like', '%'.$request->search.'%');
        })
        ->paginate(10);
    
        // if ($request->ajax()) {
        //     $view = view('ports.partials.table_rows', compact('dyer_openings'))->render();
        //     $pagination = $ports->links()->toHtml();
        //     return response()->json(['tableRows' => $view, 'pagination' => $pagination]);
        // }
    
        return view('dyer_openings.index', compact('dyer_openings'));
    }
    
    public function getDyerOpenings(Request $request)
    {
        if ($request->ajax()) {
            $data = DyerOpening::latest()->get();
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
                    $editBtn = '<a href="' . route('dyer_openings.edit', $row->id) . '" class="btn btn-sm btn-success">Edit</a>';
                    $deleteBtn = '<button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteRecordModal" data-id="'.$row->id.'">Remove</button>';

                    return $editBtn . ' ' . $deleteBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function create(){
        return view('dyer_openings.create');
    }

    public function store(Request $request)
    {
        $request->validate(
            ['dyer_name' => 'required'],
            ['place' => 'required']
        );
        DyerOpening::create($request->all());
        return redirect()->route('dyer_openings.index')->with('success', 'Record added successfully!');
    }

    public function edit($id)
    {
        $dyers = DyerOpening::findOrFail($id);
        return view('dyer_openings.edit', compact('dyers'));
    }
 
      
    public function update(Request $request, $id)
    {
        $dyer_openings = DyerOpening::findOrFail($id);
        $dyer_openings->update([
            'dyer_name' => $request->dyer_name,
            'place' => $request->place,
        ]);
        
        return redirect()->route('dyer_openings.index')->with('success', 'Record updated successfully!');
    }

    public function destroy($id)
    {
        $dyer_openings = DyerOpening::findOrFail($id);
        $dyer_openings->delete();
        return response()->json(['success' => 'Country deleted successfully']);
    }
}
