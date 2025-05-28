<?php

namespace App\Http\Controllers;

use App\Models\GreyYarn;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Yajra\DataTables\Facades\DataTables;

class GreyYarnController extends Controller
{
    public function index()
    {
        $greyYarns = GreyYarn::all();
        return view('grey_yarns.index', compact('greyYarns'));
    }

    public function create()
    {
        $units = ['Tex', 'Decitex', 'Denier'];
        return view('grey_yarns.create', compact('units'));
    }
   public function getGreyYarns(Request $request)
{
    if ($request->ajax()) {
        $data = GreyYarn::latest()->get();
        return DataTables::of($data)
            ->addIndexColumn()
            ->editColumn('created_at', fn($row) => Carbon::parse($row->created_at)->diffForHumans())
            ->editColumn('updated_at', fn($row) => Carbon::parse($row->updated_at)->diffForHumans())
            ->editColumn('status', function ($row) {
                $checked = $row->status == 1 ? 'checked' : ''; // Check if the status is 1 (Active)
                return '
                    <label class="switch">
                        <input type="checkbox" class="status-toggle" data-id="' . $row->id . '" ' . $checked . '>
                        <span class="slider round"></span>
                    </label>
                ';
            })
            ->addColumn('action', function ($row) {
                return '
                    <a href="' . route('grey_yarns.edit', $row->id) . '" class="btn btn-sm btn-success">Edit</a>
                    <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteRecordModal" data-id="' . $row->id . '">Remove</button>
                ';
            })
            ->rawColumns(['status', 'action']) // Allow raw HTML for status and actions
            ->make(true);
    }
}
    public function store(Request $request)
    {
        $request->validate([
            'count' => 'required|string',
            'group_name' => 'required|string',
            'yarn_name' => 'required|string',
            'count_name' => 'required|string',
            'warp_otam' => 'required|string',
            'weft_otam' => 'required|string',
            'seer_warp_otam' => 'required|string',
        ]);

        GreyYarn::create($request->all());
        return redirect()->route('grey_yarns.index')->with('success', 'Grey Yarn created successfully.');
    }

    public function edit(GreyYarn $greyYarn)
    {
        $units = ['Tex', 'Decitex', 'Denier'];
        return view('grey_yarns.edit', compact('greyYarn', 'units'));
    }

    public function update(Request $request, GreyYarn $greyYarn)
    {
        $greyYarn->update($request->all());
        return redirect()->route('grey_yarns.index')->with('success', 'Grey Yarn updated successfully.');
    }

    public function destroy(GreyYarn $greyYarn)
    {
        $greyYarn->delete();
        return redirect()->route('grey_yarns.index')->with('success', 'Grey Yarn deleted successfully.');
    }
}
