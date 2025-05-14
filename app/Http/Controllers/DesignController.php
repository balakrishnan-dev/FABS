<?php


namespace App\Http\Controllers;

use App\Models\Design;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;
use App\Models\LoomType;
use App\Models\Buyer;

class DesignController extends Controller
{

    public function index(Request $request)
    {
        $designs = Design::when($request->search, function ($query) use ($request) {
            return $query->where('loom_type', 'like', '%'.$request->search.'%')
                ->orWhere('order_type', 'like', '%'.$request->search.'%')
                ->orWhere('cl_no', 'like', '%'.$request->search.'%')
                ->orWhere('design_name', 'like', '%'.$request->search.'%')
                ->orWhere('po_no', 'like', '%'.$request->search.'%')
                ->orWhere('weaving_type', 'like', '%'.$request->search.'%')
                ->orWhere('buyer_name', 'like', '%'.$request->search.'%')
                ->orWhere('attention', 'like', '%'.$request->search.'%');
        })->paginate(10);

        return view('designs.index', compact('designs'));
    }
    public function getDesigns(Request $request)
    {
        if ($request->ajax()) {
            $data = Design::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('created_at', function ($row) {
                    return Carbon::parse($row->created_at)->diffForHumans();
                })
                ->editColumn('updated_at',function ($row){
                    return Carbon::parse($row->updated_at)->diffForHumans();
                })
                ->addColumn('action', function ($row) {
                    $editBtn = '<a href="' . route('designs.edit', $row->id) . '" class="btn btn-sm btn-success">Edit</a>';
                    $deleteBtn = '<button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteRecordModal" data-id="'.$row->id.'">Remove</button>';
                    return $editBtn . ' ' . $deleteBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
    public function create()
    {
        $datas = LoomType::all();
        $buyers = Buyer::all();
        return view('designs.create',compact('datas','buyers'));
    }

        public function store(Request $request)
        {
            $validated = $request->validate([
                'loom_type'      => 'required|string',
                'order_type'     => 'required|string',
                'cl_no'          => 'required|string',
                'design_name'    => 'required|string',
                'po_no'          => 'required|string',
                'weaving_type'   => 'required|string',
                'pick'           => 'required|numeric',
                'read'           => 'required|numeric',
                'rate_per_mts'   => 'required|numeric',
                'width'          => 'required|numeric',
                'weaver_mts'     => 'required|numeric',
                'order_mts'      => 'required|numeric',
                'welt_mts'       => 'required|numeric',
                'order_date'     => 'required|date',
                'count'          => 'required|string',
                'buyer_name'     => 'required|string',
                'attention'      => 'required|string',
            ]);

            Design::create($validated);
            return redirect()->route('designs.index')->with('success', 'Design created successfully.');
        }

    
      public function edit($id)
        {
            $design = Design::findOrFail($id);
            $buyers = Buyer::all();
            $datas = LoomType::all();
            return view('designs.edit', compact('design', 'datas','buyers'));
        }

        
    public function update(Request $request, $id)
    {
        $request->validate([
            'loom_type' => 'required|string|max:255',
            'order_type' => 'required|string|max:255',
            'cl_no' => 'required|string|max:255',
            'design_name' => 'required|string|max:255',
            'po_no' => 'nullable|string|max:255',
            'weaving_type' => 'required|string|max:255',
            'pick' => 'nullable|string|max:255',
            'read' => 'nullable|string|max:255',
            'rate_per_mts' => 'nullable|numeric',
            'width' => 'nullable|string|max:255',
            'weaver_mts' => 'nullable|numeric',
            'order_mts' => 'nullable|numeric',
            'welt_mts' => 'nullable|numeric',
            'order_date' => 'required|date',
            'count' => 'nullable|string|max:255',
            'buyer_name' => 'nullable|string|max:255',
            'atten' => 'nullable|string|max:255',
        ]);

        $design = Design::findOrFail($id);
        $design->update($request->all());

        return redirect()->route('designs.index')->with('success', 'Design updated successfully.');
    }

    public function destroy($id)
    {
        $design = Design::findOrFail($id);
        $design->delete();
        return response()->json(['success' => 'Country deleted successfully']);
    }
}
