<?php

namespace App\Http\Controllers;

use App\Models\SizingMaster;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;

class SizingMasterController extends Controller
{
    public function index()
    {
        return view('sizing-masters.index');
    }

    public function getSizing(Request $request)
    {
        if ($request->ajax()) {
            $data = SizingMaster::latest()->get();

            return DataTables::of($data)
                ->addIndexColumn()

                ->editColumn('date_from', function ($row) {
                    return Carbon::parse($row->date_from)->format('d-m-Y');
                })

                ->editColumn('date_to', function ($row) {
                    return Carbon::parse($row->date_to)->format('d-m-Y');
                })

                ->editColumn('created_at', function ($row) {
                    return Carbon::parse($row->created_at)->diffForHumans();
                })

                ->editColumn('updated_at', function ($row) {
                    return Carbon::parse($row->updated_at)->diffForHumans();
                })

                ->addColumn('action', function ($row) {
                    $editBtn = '<a href="' . route('sizing-masters.edit', $row->id) . '" class="btn btn-sm btn-success">Edit</a>';
                    $deleteBtn = '<button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteRecordModal" data-id="' . $row->id . '">Remove</button>';
                    return $editBtn . ' ' . $deleteBtn;
                })

                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function create()
    {
        $loomTypes = ['Auto', 'Manual', 'Powerloom']; // Or fetch from DB
        $orderTypes = ['Fresh', 'Repeat', 'Urgent'];
        return view('sizing-masters.create', compact('loomTypes', 'orderTypes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'loom_type' => 'required|string|max:50',
            'order_type' => 'required|string|max:50',
            'cl_no' => 'required|string|max:50',
            'particulars' => 'required|string|max:255',
            'sizing_name' => 'required|string|max:100',
            'date_from' => 'required|date',
            'date_to' => 'required|date|after_or_equal:date_from',
        ]);

        SizingMaster::create($request->all());

        return redirect()->route('sizing-masters.index')->with('success', 'Sizing record created.');
    }

    public function edit($id)
    {
        $sizingMaster = SizingMaster::findOrFail($id);
        $loomTypes = ['Auto', 'Manual', 'Powerloom'];
        $orderTypes = ['Fresh', 'Repeat', 'Urgent'];
        return view('sizing-masters.edit', compact('sizingMaster', 'loomTypes', 'orderTypes'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'loom_type' => 'required|string|max:50',
            'order_type' => 'required|string|max:50',
            'cl_no' => 'required|string|max:50',
            'particulars' => 'required|string|max:255',
            'sizing_name' => 'required|string|max:100',
            'date_from' => 'required|date',
            'date_to' => 'required|date|after_or_equal:date_from',
        ]);

        $sizingMaster = SizingMaster::findOrFail($id);
        $sizingMaster->update($request->all());

        return redirect()->route('sizing-masters.index')->with('success', 'Record updated successfully!');
    }

    public function destroy($id)
    {
        $sizing = SizingMaster::findOrFail($id);
        $sizing->delete();
        return response()->json(['success' => 'Record deleted successfully']);
    }
}
