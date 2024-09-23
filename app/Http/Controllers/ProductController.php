<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();


        return view('admin.product.index');
    }

    /**
     * Show the form for creating a new resource.
     */

     public function api()
     {
        $products = Product::all();
        $datatables = datatables()->of($products)->addIndexColumn();

        return $datatables->make(true);
     }
     public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $this->validate($request,[
        //     'pd_code' => ['required'],
        //     'pd_ct_id' => ['required'],
        //     'pd_name' => ['required'],
        //     'pd_price' => ['required'],
        // ]);

        // Product::create($request->all());

        // return redirect('products')->with('success', 'Member Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
    //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $this->validate($request,[
            'pd_code' => ['required'],
            'pd_ct_id' => ['required'],
            'pd_name' => ['required'],
            'pd_price' => ['required'],
        ]);
        $product->update($request->all());


        // return redirect('products');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
    }
}
