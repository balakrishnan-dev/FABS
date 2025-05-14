<?php

namespace App\Http\Controllers;

use App\Models\SystemOption;
use Illuminate\Http\Request;

class SystemOptionController extends Controller
{
    // Show the options page
    public function index()
    {
        $options = SystemOption::all();
        return view('options.index', compact('options'));
    }

    // Show the form to create a new option
    public function create()
    {
        return view('options.create');
    }

    // Store a new option in the database
    public function store(Request $request)
    {
        $request->validate([
            'option_name' => 'required|string|max:255',
            'option_value' => 'nullable|string',
        ]);

        SystemOption::create($request->all());

        return redirect()->route('options.index')->with('success', 'Option created successfully.');
    }

    // Show the form to edit an option
    public function edit($id)
    {
        $option = SystemOption::findOrFail($id);
        return view('options.edit', compact('option'));
    }

    // Update an option in the database
    public function update(Request $request, $id)
    {
        $request->validate([
            'option_name' => 'required|string|max:255',
            'option_value' => 'nullable|string',
        ]);

        $option = SystemOption::findOrFail($id);
        $option->update($request->all());

        return redirect()->route('options.index')->with('success', 'Option updated successfully.');
    }

    // Delete the option
    public function destroy($id)
    {
        $option = SystemOption::findOrFail($id);
        $option->delete();

        return redirect()->route('options.index')->with('success', 'Option deleted successfully.');
    }
}
