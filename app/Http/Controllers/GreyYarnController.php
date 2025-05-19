<?php

namespace App\Http\Controllers;

use App\Models\GreyYarn;
use Illuminate\Http\Request;
use Carbon\Carbon;

class GreyYarnController extends Controller
{
    public function index()
    {
        $greyYarns = GreyYarn::all();
        return view('grey_yarns.index', compact('greyYarns'));
    }

    public function create()
    {
        $units = ['Tex', 'Decitex', 'Denier'];
        return view('grey_yarns.create', compact('units'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'count' => 'required|string',
            'group_name' => 'required|string',
            'yarn_name' => 'required|string',
            'count_name' => 'required|string',
            'warp_otam' => 'required|string',
            'weft_otam' => 'required|string',
            'seer_warp_otam' => 'required|string',
        ]);

        GreyYarn::create($request->all());
        return redirect()->route('grey-yarns.index')->with('success', 'Grey Yarn created successfully.');
    }

    public function edit(GreyYarn $greyYarn)
    {
        $units = ['Tex', 'Decitex', 'Denier'];
        return view('grey_yarns.edit', compact('greyYarn', 'units'));
    }

    public function update(Request $request, GreyYarn $greyYarn)
    {
        $greyYarn->update($request->all());
        return redirect()->route('grey-yarns.index')->with('success', 'Grey Yarn updated successfully.');
    }

    public function destroy(GreyYarn $greyYarn)
    {
        $greyYarn->delete();
        return redirect()->route('grey-yarns.index')->with('success', 'Grey Yarn deleted successfully.');
    }
}
