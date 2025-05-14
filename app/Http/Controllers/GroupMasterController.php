<?php

namespace App\Http\Controllers;

use App\Models\GroupMaster;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;

class GroupMasterController extends Controller
{
    public function index()
    {
        return view('group_masters.index');
    }

   public function getData(Request $request)
{
    if ($request->ajax()) {
        $data = GroupMaster::latest()->get();
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
                    <a href="' . route('group-masters.edit', $row->id) . '" class="btn btn-sm btn-success">Edit</a>
                    <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteRecordModal" data-id="' . $row->id . '">Remove</button>
                ';
            })
            ->rawColumns(['status', 'action']) // Allow raw HTML for status and actions
            ->make(true);
    }
}



    public function create()
    {
        return view('group_masters.create');
    }

   public function store(Request $request)
{
    $request->validate([
        'group_name' => 'required',
        'group_type' => 'required',
    ]);

    // Check if status checkbox is checked, otherwise set to 0
    $status = $request->has('status') ? 1 : 0;

    GroupMaster::create([
        'group_name' => $request->group_name,
        'group_type' => $request->group_type,
        'description' => $request->description,
        'status' => $status, // handle status value
    ]);

    return redirect()->route('group-masters.index')->with('success', 'Group created successfully.');
}

    public function edit(GroupMaster $groupMaster)
    {
        return view('group_masters.edit', compact('groupMaster'));
    }

   public function update(Request $request, GroupMaster $groupMaster)
{
    $request->validate([
        'group_name' => 'required',
        'group_type' => 'required',
    ]);

    // Check if status checkbox is checked, otherwise set to 0
    $status = $request->has('status') ? 1 : 0;

    $groupMaster->update([
        'group_name' => $request->group_name,
        'group_type' => $request->group_type,
        'description' => $request->description,
        'status' => $status, // handle status value
    ]);

    return redirect()->route('group-masters.index')->with('success', 'Group updated successfully.');
}

public function updateStatus(Request $request, $id)
{
    $groupMaster = GroupMaster::findOrFail($id);
    $groupMaster->status = $request->status;
    $groupMaster->save();

    return response()->json(['success' => 'Status updated successfully.']);
}

    public function destroy($id)
    {
        $groupMaster = GroupMaster::findOrFail($id);
        $groupMaster->delete();
        return response()->json(['success' => 'Deleted successfully']);
    }
}
