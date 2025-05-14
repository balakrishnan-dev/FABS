<?php

namespace App\Http\Controllers;

use App\Models\GreyYarn;
use Illuminate\Http\Request;
use Carbon\Carbon;

class GreyYarnController extends Controller
{
    public function index()
    {
        return view('grey_yarns.index', ['greyYarns' => GreyYarn::all()]);
    }

    public function create()
    {
        return view('grey_yarns.create');
    }

    public function store(Request $request)
    {
        GreyYarn::create($request->validate([
            'type' => 'required|string',
            'code' => 'required|string|unique:grey_yarns,code',
            'description' => 'nullable|string',
        ]));

        return redirect()->route('grey_yarns.index')->with('success', 'Grey Yarn created.');
    }

    public function edit(GreyYarn $greyYarn)
    {
        return view('grey_yarns.edit', compact('greyYarn'));
    }

    public function update(Request $request, GreyYarn $greyYarn)
    {
        $greyYarn->update($request->validate([
            'type' => 'required|string',
            'code' => 'required|string|unique:grey_yarns,code,' . $greyYarn->id,
            'description' => 'nullable|string',
        ]));

        return redirect()->route('grey_yarns.index')->with('success', 'Grey Yarn updated.');
    }

    public function destroy(GreyYarn $greyYarn)
    {
        $greyYarn->delete();
        return redirect()->route('grey_yarns.index')->with('success', 'Grey Yarn deleted.');
    }
}
