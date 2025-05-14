<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Role;

class UserController extends Controller
{
    // Display users list
    public function index()
    {
        return view('users.index');
    }

    // Show the form to create a new user
    public function create()
    {
        $roles = Role::all();
        return view('users.create',compact('roles'));
    }

    // Get all users data for DataTables via AJAX
    public function getUsers(Request $request)
    {
        if ($request->ajax()) {
            $data = User::latest()->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('created_at', function ($row) {
                    return Carbon::parse($row->created_at)->diffForHumans();
                })
                ->editColumn('updated_at', function ($row) {
                    return Carbon::parse($row->updated_at)->diffForHumans();
                })
                ->addColumn('action', function ($row) {
                    $editBtn = '<a href="' . route('users.edit', $row->id) . '" class="btn btn-sm btn-success">Edit</a>';
                    $deleteBtn = '<button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteRecordModal" data-id="' . $row->id . '">Remove</button>';
                    return $editBtn . ' ' . $deleteBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    // Store a newly created user in the database
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'role' => 'required',
            'status' => 'required',
        ]);

        // Create the user record
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'status' => $request->status,
        ]);

        // Redirect back with success message
        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

        public function edit(User $user)
        {
            $roles = Role::all();
            return view('users.edit', compact('roles', 'user'));
        }

    // Update the specified user in the database
    public function update(Request $request, User $user)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role' => 'required',
            'status' => 'required',
        ]);

        // Update user data
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->status = $request->status;

        // Update password if provided
        if ($request->filled('password')) {
            $request->validate([
                'password' => 'nullable|min:6|confirmed',
            ]);
            $user->password = Hash::make($request->password);
        }

        // Save the user changes
        $user->save();

        // Redirect back with success message
        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

   public function destroy($id)
{
    $user = User::findOrFail($id);
    $user->delete();
    return response()->json(['success' => 'User deleted successfully']);
}

}