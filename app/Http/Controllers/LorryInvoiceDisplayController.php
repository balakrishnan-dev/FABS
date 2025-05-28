<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LorryInvoiceDisplay;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;

class LorryInvoiceDisplayController extends Controller
{
    public function index()
    {
        return view('lorries_invoice_display.index');
    }

   public function getData(Request $request)
{
    $data = LorryInvoiceDisplay::latest()->get();

    return DataTables::of($data)
        ->addIndexColumn()
        ->addColumn('action', function($row){
            $btn = '<a href="'.route('lorries_invoice_display.edit', $row->id).'" class="edit btn btn-primary btn-sm">Edit</a>';
            $btn .= ' <button class="btn btn-danger btn-sm" data-id="'.$row->id.'" data-bs-toggle="modal" data-bs-target="#deleteRecordModal">Delete</button>';
            return $btn;
        })
        ->rawColumns(['action'])
        ->make(true);
}




    public function create()
    {
        return view('lorries_invoice_display.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'loom_type' => 'required',
            'order_type' => 'required',
            'CL_No' => 'required',
            'design_name' => 'required',
            'party_name' => 'required',
            'date_from' => 'required|date',
            'date_to' => 'required|date',
        ]);

        LorryInvoiceDisplay::create($request->all());

        return redirect()->route('lorries_invoice_display.index')->with('success', 'Record created successfully.');
    }

    public function edit($id)
    {
        $Lorry = LorryInvoiceDisplay::findOrFail($id);
        return view('lorries_invoice_display.edit', compact('Lorry'));
    }


    public function update(Request $request, $id)
    {
        $Lorry = LorryInvoiceDisplay::findOrFail($id);

        $request->validate([
            'loom_type' => 'required',
            'order_type' => 'required',
            'CL_No' => 'required',
            'design_name' => 'required',
            'party_name' => 'required',
            'date_from' => 'required|date',
            'date_to' => 'required|date',
        ]);

        $Lorry->update($request->only([
            'loom_type',
            'order_type',
            'CL_No',
            'design_name',
            'party_name',
            'date_from',
            'date_to',
        ]));

        return redirect()->route('lorries_invoice_display.index')->with('success', 'Record updated successfully.');
    }

    public function destroy($id)
    {
        
        $Lorry = LorryInvoiceDisplay::findOrFail($id);
        $Lorry->delete();
        return response()->json(['success' => 'Record deleted Sucessfully']);
    }
}
