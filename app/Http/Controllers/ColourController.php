<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Colour;
use Yajra\DataTables\Facades\DataTables;
use Carbon;

class ColourController extends Controller
{
    public function index(Request $request)
{
    $colours = Colour::when($request->search, function ($query) use ($request) {
        return $query->where('colour_name', 'like', '%'.$request->search.'%')
            ->orWhere('tamil_colour_name', 'like', '%'.$request->search.'%');
    })->paginate(10);

    if ($request->ajax()) {
        $view = view('colours.partials.table_rows', compact('colours'))->render();
        $pagination = $colours->links()->toHtml(); // corrected from $ports
        return response()->json(['tableRows' => $view, 'pagination' => $pagination]);
    }

    // Static Tamil colour list
    $tamilColours = [
        'சிவப்பு', 'பச்சை', 'நீலம்', 'மஞ்சள்', 'கருப்பு', 'வெள்ளை', 'இளஞ்சிவப்பு', 'நறுநீலம்'
    ];

    return view('colours.index', compact('colours', 'tamilColours'));
}
    
    public function getColours(Request $request)
    {
        if ($request->ajax()) {
            $data = Colour::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('created_at', function ($row) {
                    return Carbon\Carbon::parse($row->created_at)->diffForHumans();
                })
                ->editColumn('updated_at',function ($row){
                    return Carbon\Carbon::parse($row->updated_at)->diffForHumans();
                })
                ->addColumn('action', function ($row) {
                    // Update the Edit button to redirect to the edit page
                    $editBtn = '<a href="' . route('colours.edit', $row->id) . '" class="btn btn-sm btn-success">Edit</a>';
                    $deleteBtn = '<button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteRecordModal" data-id="'.$row->id.'">Remove</button>';

                    return $editBtn . ' ' . $deleteBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function create()
    {
        $tamilColours = [
            'சிவப்பு', 'பச்சை', 'நீலம்', 'மஞ்சள்', 'கருப்பு', 'வெள்ளை', 'இளஞ்சிவப்பு', 'நறுநீலம்'
        ];
    
        return view('colours.create', compact('tamilColours'));
    }
    

    public function store(Request $request)
    {
        $request->validate([
            'colour_name' => 'required|string|max:255',
            'tamil_colour_name' => 'required|string|max:255',
        ]);

        Colour::create($request->only(['colour_name', 'tamil_colour_name']));

        return redirect()->route('colours.index')->with('success', 'Colour added successfully.');
    }

    public function edit($id)
    {
        $colours = Colour::findOrFail($id);
    
        $tamilColours = [
            'சிவப்பு', 'பச்சை', 'நீலம்', 'மஞ்சள்', 'கருப்பு', 'வெள்ளை', 'இளஞ்சிவப்பு', 'நறுநீலம்'
        ];
    
        return view('colours.edit', compact('colours', 'tamilColours'));
    }
    
 
      
    public function update(Request $request, $id)
    {
        $request->validate([
            'colour_name' => 'required|string|max:255',
            'tamil_colour_name' => 'required|string|max:255',
        ]);

        $colour = Colour::findOrFail($id);
        $colour->update([
            'colour_name' => $request->colour_name,
            'tamil_colour_name' => $request->tamil_colour_name,
        ]);

        return redirect()->route('colours.index')->with('success', 'Colour updated successfully!');
    }



    public function destroy($id)
    {
        $colours = Colour::findOrFail($id);
        $colours->delete();
        return response()->json(['success' => 'Record deleted successfully']);
    }
}
