<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GreyYarn;
use Yajra\DataTables\Facades\DataTables;


class YarnDisplayController extends Controller
{
    public function index()
    {
        return view('yarns_displays.index');  // No $lists here for ajax load
    }

    public function getData(Request $request)
{
    if ($request->ajax()) {
        $query = GreyYarn::query();
        return DataTables::of($query)
            ->addIndexColumn()
            ->make(true);
    }
}

}
