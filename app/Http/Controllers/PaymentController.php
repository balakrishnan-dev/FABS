<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;

class PaymentController extends Controller
{
    // Index method to return the main page view
    public function index()
    {
        return view('payments.index');
    }

    // Fetch payments for DataTables (AJAX request)
    public function getPayments(Request $request)
    {
        if ($request->ajax()) {
            $data = Payment::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('created_at', function ($row) {
                    return Carbon::parse($row->created_at)->diffForHumans();
                })
                ->editColumn('updated_at',function ($row){
                    return Carbon::parse($row->updated_at)->diffForHumans();
                })
                ->addColumn('action', function ($row) {
                    // Edit button (redirect to edit page)
                    $editBtn = '<a href="' . route('payments.edit', $row->id) . '" class="btn btn-sm btn-success">Edit</a>';
                    // Delete button with modal
                    $deleteBtn = '<button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteRecordModal" data-id="' . $row->id . '">Remove</button>';
                    return $editBtn . ' ' . $deleteBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    // Show the create form for payments
    public function create()
    {
        return view('payments.create');
    }

    // Store a newly created payment
    public function store(Request $request)
    {
        $request->validate([
            'date_from' => 'required|date',
            'date_to' => 'required|date',
            'supplier_name' => 'required|string',
            'by' => 'required|string',
            'group_by' => 'required|string',
        ]);

        Payment::create($request->all());

        return redirect()->route('payments.index')->with('success', 'Payment created successfully.');
    }

    // Show the edit form for a specific payment
    public function edit($id)
    {
        $payment = Payment::find($id);
        return view('payments.edit', compact('payment'));
    }

    // Update an existing payment
    public function update(Request $request, $id)
    {
        $payment = Payment::findOrFail($id);

        // Validate the input data
        $request->validate([
            'date_from' => 'required|date',
            'date_to' => 'required|date',
            'supplier_name' => 'required|string',
            'by' => 'required|string',
            'group_by' => 'required|string',
        ]);

        // Update the payment record
        $payment->update($request->all());

        return redirect()->route('payments.index')->with('success', 'Payment updated successfully.');
    }

    // Delete a specific payment
    public function destroy($id)
    {
        $payment = Payment::findOrFail($id);
        $payment->delete();

        return response()->json(['success' => 'Payment deleted successfully.']);
    }
}
