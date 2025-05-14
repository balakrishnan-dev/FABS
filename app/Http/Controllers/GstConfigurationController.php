<?php

namespace App\Http\Controllers;

use App\Models\GstConfiguration;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;

class GstConfigurationController extends Controller
{
    public function index()
    {
        return view('gst_configurations.index');
    }

    public function getGsts(Request $request)
    {
        if ($request->ajax()) {
            $data = GstConfiguration::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()

                // Format created_at
                ->editColumn('created_at', function ($row) {
                    return Carbon::parse($row->created_at)->diffForHumans();
                })

                // Status Toggle HTML in 'updated_at' column
                ->addColumn('updated_at', function ($row) {
                    $checked = $row->gst_status === 'approved' ? 'checked' : '';
                    return '
                        <div class="form-check form-switch form-switch-success">
                            <input class="form-check-input status-toggle" type="checkbox" role="switch"
                                   data-id="' . $row->id . '" ' . $checked . '>
                        </div>';
                })

                // Action buttons
                ->addColumn('action', function ($row) {
                    $editUrl = route('gst_configurations.edit', $row->id);
                    $editBtn = '<a href="' . $editUrl . '" class="btn btn-sm btn-success">Edit</a>';
                    $deleteBtn = '<button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteRecordModal" data-id="' . $row->id . '">Remove</button>';
                    return $editBtn . ' ' . $deleteBtn;
                })

                // Make sure HTML is rendered properly
                ->rawColumns(['updated_at', 'action'])

                ->make(true);
        }
    }

    public function create()
    {
        return view('gst_configurations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'gst_status' => 'required|in:approved,rejected',
            'gst_percentage' => 'required|numeric|min:0|max:100',
            'effective_from' => 'required|date',
        ]);

        GstConfiguration::create($request->all());

        return redirect()->route('gst_configurations.index')
                         ->with('success', 'GST Configuration created successfully.');
    }

    public function edit(GstConfiguration $gstConfiguration)
    {
        return view('gst_configurations.edit', compact('gstConfiguration'));
    }

    public function update(Request $request, GstConfiguration $gstConfiguration)
    {
        $request->validate([
            'gst_status' => 'required|in:approved,rejected',
            'gst_percentage' => 'required|numeric|min:0|max:100',
            'effective_from' => 'required|date',
        ]);

        $gstConfiguration->update($request->all());

        return redirect()->route('gst_configurations.index')
                         ->with('success', 'GST Configuration updated successfully.');
    }

public function updateStatus($id, Request $request)
{
    $gstConfig = GstConfiguration::findOrFail($id);

    $gstConfig->gst_status = $request->status; // or $gstConfig->is_active = $request->status;
    $gstConfig->save();

    return response()->json(['message' => 'Status updated successfully']);
}

public function destroy($id)
{
    $port = GstConfiguration::findOrFail($id);
    $port->delete();

    return response()->json(['success' => 'Deleted successfully']);
}

}
