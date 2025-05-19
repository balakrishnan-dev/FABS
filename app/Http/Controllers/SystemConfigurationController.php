<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\YearConfig;
use App\Models\OptionSetting;
use App\Models\AdjustmentEntry;
use App\Models\WAdjustment;

class SystemConfigurationController extends Controller
{
    public function index()
    {
        return view('system_configuration.index');
    }

    public function storeYear(Request $request)
    {
        YearConfig::create($request->all());
        return response()->json(['success' => true]);
    }

    public function storeOption(Request $request)
    {
        OptionSetting::create($request->all());
        return response()->json(['success' => true]);
    }

    public function storeAdjustment(Request $request)
    {
        AdjustmentEntry::create($request->all());
        return response()->json(['success' => true]);
    }

    public function storeWAdjustment(Request $request)
    {
        WAdjustment::create($request->all());
        return response()->json(['success' => true]);
    }

    // Add edit, update, delete methods similarly...
}
