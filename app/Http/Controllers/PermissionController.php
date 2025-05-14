<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;

class PermissionController extends Controller
{
    public function index()
    {
        return view('permissions.index');
    }
    public function create()
       {
        return view('permissions.create');
    }

   public function getPermissions(Request $request) 
{
    if ($request->ajax()) {
        $data = Permission::latest()->get();
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('checkbox', function ($row) {
                return '<input type="checkbox" class="form-check-input row-checkbox" value="'.$row->id.'">';
            })
            ->editColumn('created_at', function ($row) {
                return Carbon::parse($row->created_at)->diffForHumans();
            })
                ->editColumn('updated_at', function ($row) {
                return Carbon::parse($row->updated_at)->diffForHumans();
            })
            ->addColumn('action', function ($row) {
                $edit = '<a href="'.route('permissions.edit', $row->id).'" class="btn btn-sm btn-success">Edit</a>';
                $delete = '<button data-id="'.$row->id.'" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteRecordModal">Delete</button>';
                return $edit . ' ' . $delete;
            })
            ->rawColumns(['checkbox', 'action']) // Allow HTML
            ->make(true);
    }

    return view('permissions.index');
}

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:permissions,name',
        ]);
        Permission::create($request->only('name'));
        return redirect()->route('permissions.index')->with('success', 'Payment created successfully.');
    }
 


    public function edit($id)
    {
        $permission = Permission::findOrFail($id);
        return view('permissions.edit', compact('permission'));
    }



    public function update(Request $request, $id)
    {
        $permission = Permission::findOrFail($id);

        $request->validate([
            'name' => 'required|unique:permissions,name,'.$id,
        ]);

        $permission->update($request->only('name', 'description'));
        return redirect()->route('permissions.index')->with('success', 'Payment Updated successfully.');
    }

    public function destroy($id)
    {
        Permission::findOrFail($id)->delete();
        return response()->json(['success' => 'Payment deleted successfully.']);
    }
    
}
