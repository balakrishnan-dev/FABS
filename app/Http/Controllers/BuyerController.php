<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buyer;
use Carbon\Carbon;
use Yajra\DataTables\DataTables;

class BuyerController extends Controller
{
    public function index(Request $request)
{
    $buyers = Buyer::when($request->search, function ($query) use ($request) {
        return $query->where('buyer_name', 'like', '%'.$request->search.'%');
    })->paginate(10);

 
    return view('buyers.index', compact('buyers'));
}
    
    public function getBuyers(Request $request)
    {
        if ($request->ajax()) {
            $data = Buyer::latest()->get();
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
                    $editBtn = '<a href="' . route('buyers.edit', $row->id) . '" class="btn btn-sm btn-success">Edit</a>';
                    $deleteBtn = '<button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteRecordModal" data-id="'.$row->id.'">Remove</button>';

                    return $editBtn . ' ' . $deleteBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }


    public function create(){
        return view('buyers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'buyer_name' => 'required|string|max:255'
        ]);

        Buyer::create($request->only(['buyer_name']));

        return redirect()->route('buyers.index')->with('success', 'Record added successfully.');
    }

    public function edit($id)
    {
        $buyers = Buyer::findOrFail($id);
    
        return view('buyers.edit', compact('buyers'));
    }
    
 
      
    public function update(Request $request, $id)
    {
        $request->validate([
            'buyer_name' => 'required|string|max:255',
        ]);

        $buyers = Buyer::findOrFail($id);
        $buyers->update([
            'buyer_name' => $request->buyer_name,
        ]);

        return redirect()->route('buyers.index')->with('success', 'Record updated successfully!');
    }



    public function destroy($id)
    {
        $buyers = Buyer::findOrFail($id);
        $buyers->delete();
        return response()->json(['success' => 'Record deleted successfully']);
    }
}
