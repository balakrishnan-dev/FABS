<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ProductController extends Controller
{

    public function index(Request $request)
    {
        $products = Product::when($request->search, function ($query) use ($request) {
            return $query->where('name', 'like', '%'.$request->search.'%')
            ->Orwhere('category', 'like', '%'.$request->search.'%');
        })
        ->paginate(10);
    
        // if ($request->ajax()) {
        //     $view = view('ports.partials.table_rows', compact('ports'))->render();
        //     $pagination = $ports->links()->toHtml();
        //     return response()->json(['tableRows' => $view, 'pagination' => $pagination]);
        // }
    
        return view('products.index', compact('products'));
    }

    public function getData()
    {
        $products = Product::select('id', 'name', 'category', 'created_at', 'updated_at');
    
        return Datatables::of($products)
            ->addColumn('action', function($product) {
                return '<button class="btn btn-warning btn-sm edit" data-id="'.$product->id.'">Edit</button>
                        <button class="btn btn-danger btn-sm delete" data-id="'.$product->id.'">Delete</button>';
            })
            ->make(true);
    }
    



    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
       $request->validate(
            ['name' => 'required|string'],
            ['category' => 'nullable|string'],
        );
        Product::create($request->all());
        return redirect()->route('products.index')->with('success', 'Product created.');
    }

    public function edit($id)
    {
        $products = Product::findOrFail($id);
        return view('products.edit', compact('products'));
    }

    public function update(Request $request, $id)
    {
        $products = Product::findOrFail($id);
        $products->update([
            'name' => $request->name,
            'category' => $request->category,
        ]);
        
        return redirect()->route('products.index')->with('success', 'Record updated successfully!');
    }

    public function destroy($id)
    {
        $products = Product::findOrFail($id);
        $products->delete();
        return response()->json(['success' => 'Country deleted successfully']);
    }
}
