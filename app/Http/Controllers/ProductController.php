<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
   
    public function index()
    {
        return collect(Product::with('user','discounts')->orderBy('created_at','desc')->paginate(20));
    }


    public function store(Request $request)
    {
        $product  = Product::create();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Product::with('user', 'discounts')->where('id', $id)->get();
    }

    public function update(Request $request, $id)
    {
        $product  = Product::where('id', $id)->get();
        $product->name = $request->name;
        $product->about = $request->about;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->color = $request->color;
        $product->save();
        return $product;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::where('id', $id)->delete();
        return true;
    }
}
