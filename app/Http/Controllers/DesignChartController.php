<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Design;

class DesignChartController extends Controller
{
    // Show the main design chart page with all designs and recent 10 stored designs
    public function index()
    {
        $designs = Design::all();
        $storedDesigns = Design::latest()->take(10)->get();

        return view('design_chart.index', compact('designs', 'storedDesigns'));
    }

    // Show a design by ID (if needed for any AJAX or API)
    public function show($id)
    {
        $design = Design::findOrFail($id);
        return response()->json($design);
    }

    // Get a design by exact CL No, used for auto-filling the form fields
    public function getByClNo($cl_no)
    {
        $cl_no = urldecode($cl_no); // decode URL encoded cl_no (e.g., spaces)

        $design = Design::where('cl_no', $cl_no)->first();

        if ($design) {
            return response()->json([
                'design_name' => $design->design_name,
                'read' => $design->read,
                'width' => $design->width,
                'pick' => $design->pick,
                'order_mts' => $design->order_mts,
                'welt_mts' => $design->welt_mts,
                'weaver_mts' => $design->weaver_mts,
            ]);
        } else {
            return response()->json([], 404);
        }
    }

    // Get design details based on loom_type, order_type, and cl_no (if you want to extend filtering)
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
                    'welt_mts' => $design->welt_mts,
                    'weaver_mts' => $design->weaver_mts,
                ],
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'No design found',
            ]);
        }
    }
}
