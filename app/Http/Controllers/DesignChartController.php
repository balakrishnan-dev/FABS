<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Design;
use App\Models\Colour;
use App\Models\DesignChart;
use App\Models\DesignChartWarp;
use App\Models\DesignChartWeft;

class DesignChartController extends Controller
{
    // Show the main design chart page with all designs and recent 10 stored designs
    public function index()
    {
        $designs = Design::all();
        $colours = Colour::all();
        $storedDesigns = Design::latest()->take(10)->get();
        $designCharts = DesignChart::latest()->get();
        return view('design_chart.index', compact('designs', 'colours', 'storedDesigns','designCharts'));
    }

    // Show a design by ID (API or AJAX)
    public function show($id)
    {
        $design = Design::findOrFail($id);
        return view('design_chart.srm_invoice',compact('design'));
    }

    // Get design details by exact CL No for autofill
    public function getByClNo($cl_no)
    {
        $cl_no = urldecode($cl_no);

        $design = Design::where('cl_no', $cl_no)->first();

        if ($design) {
            return response()->json([
                'design_name' => $design->design_name,
                'read' => $design->read,
                'width' => $design->width,
                'pick' => $design->pick,
                'order_mts' => $design->order_mts,
                'weft_mts' => $design->weft_mts,
                'weaver_mts' => $design->weaver_mts,
            ]);
        }

        return response()->json([], 404);
    }
    

    public function autocompleteClNo(Request $request)
    {
        $query = $request->get('query');

        $results = Design::where('cl_no', 'LIKE', "%{$query}%")
            ->distinct()
            ->pluck('cl_no')
            ->take(10);

        return response()->json($results);
    }

    // Filter designs based on search input for autocomplete or live search
    public function filterDesigns(Request $request)
    {
        $search = $request->input('search', '');

        $query = Design::query();

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('cl_no', 'like', "%{$search}%")
                  ->orWhere('design_name', 'like', "%{$search}%");
            });
        }

        $designs = $query->orderBy('created_at', 'desc')->limit(20)->get();

        return response()->json($designs);
    }


public function filterColours(Request $request)
{
    $search = $request->get('search');

    $colours = Colour::where('colour_name', 'like', "%{$search}%")
        ->orWhere('tamil_colour_name', 'like', "%{$search}%")
        ->limit(10)
        ->get(['colour_name', 'tamil_colour_name']);

    return response()->json($colours);
}



    // Get design details based on loom_type, order_type, and cl_no (if needed)
    public function getDesignDetails(Request $request)
    {
        $loomType = $request->input('loom_type');
        $orderType = $request->input('order_type');
        $clNo = $request->input('cl_no');

        $design = Design::where('loom_type', $loomType)
            ->where('order_type', $orderType)
            ->where('cl_no', $clNo)
            ->first();

        if ($design) {
            return response()->json([
                'success' => true,
                'data' => [
                    'design_name' => $design->design_name,
                    'read' => $design->read,
                    'pick' => $design->pick,
                    'width' => $design->width,
                    'order_mts' => $design->order_mts,
                    'weft_mts' => $design->weft_mts,
                    'weaver_mts' => $design->weaver_mts,
                ],
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'No design found',
        ]);
    }

public function store(Request $request)
{
    $validatedData = $request->validate([
        'loom_type'     => 'required|string|max:255',
        'order_type'    => 'required|string|max:255',
        'cl_no'         => 'required|string|max:255',
        'design_name'   => 'required|string|max:255',
        'read'          => 'required|numeric',
        'pick'          => 'required|numeric',
        'width'         => 'required|numeric',
        'order_mts'     => 'required|numeric',
        'warp_ends'     => 'required|numeric',
        'r_reed'        => 'nullable|string|max:255',
        'r_pick'        => 'nullable|string|max:255',
        'wa_weet'       => 'nullable|numeric',
        'we_weet'       => 'nullable|numeric',
        'weft_mts'      => 'nullable|numeric',
        'pin'           => 'nullable|string|max:255',
        'we_ord_mts'    => 'nullable|numeric',
        'wea_wt'        => 'nullable|numeric',
        'warp_wt'       => 'nullable|numeric',
        'total_picks'   => 'nullable|numeric',
    ]);

    $designChart = DesignChart::create($validatedData);

    return response()->json([
        'status' => true,
        'message' => 'Data stored successfully!',
        'data' => $designChart
    ]);
}

public function print($id)
{
    $designChart = DesignChart::with(['warps', 'wefts'])->findOrFail($id);
    return view('design_chart.print', compact('designChart'));
}


}