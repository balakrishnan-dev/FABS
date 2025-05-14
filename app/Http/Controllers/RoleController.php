<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;

class RoleController extends Controller
{
    public function index()
    {
        return view('roles.index');
    }

    public function getRoles(Request $request)
    {
        if ($request->ajax()) {
            $data = Role::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('created_at', function ($row) {
                    return Carbon::parse($row->created_at)->diffForHumans();
                })
                ->editColumn('updated_at',function ($row){
                    return Carbon::parse($row->updated_at)->diffForHumans();
                })
                ->addColumn('action', function ($row) {
                    $editBtn = '<a href="' . route('roles.edit', $row->id) . '" class="btn btn-sm btn-success">Edit</a>';
                    $deleteBtn = '<button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteRecordModal" data-id="' . $row->id . '">Remove</button>';
                    return $editBtn . ' ' . $deleteBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
    



    public function create()
    {
        return view('roles.create');
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required|unique:roles,name']);
        Role::create($request->all());
        return redirect()->route('roles.index')->with('success', 'Role created successfully.');
    }

    public function edit($id)
    {
        $role = Role::find($id);
        return view('roles.edit', compact('role'));
    }
public function update(Request $request, Role $role)
{
    // Validate the request data
    $request->validate([
        'name' => 'required|string|max:255|unique:roles,name,' . $role->id,
    ]);

    // Update the role
    $role->name = $request->name;
    $role->save();

    // Redirect back with success message
    return redirect()->route('roles.index')->with('success', 'Role updated successfully!');
}


    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();
    
        return response()->json(['success' => 'Role deleted successfully']);
    }
    
}
