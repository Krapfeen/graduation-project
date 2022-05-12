<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public $name;
    public $description;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $id)
    {
        $product = Product::query()->find($id);
        return view('product.edit', ['product' => $product]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        $name = $_GET['text'];
        $description = $_GET['description'];
        $price = $_GET['price'];

        $product = new Product();
        $product->name = $name;
        $product->description = $description;
        $product->price = $price;
        $product->save();
        return redirect()->route('product.list');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id)
    {
        $product = Product::query()->find($id);
        $lastGames = Product::query()->limit(3)->orderBy('updated_at', 'DESC')->get();
        return view('product.product', ['product' => $product, 'lastGames' => $lastGames]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $products = Product::query()->get();
        return view('product.list', ['products' => $products]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::query()->find($id);
        $name = $_GET['text'];
        $description = $_GET['description'];
        $price = $_GET['price'];

        $product->name = $name;
        $product->description = $description;
        $product->price = $price;
        $product->push();
        return redirect()->route('product.list');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::query()->find($id)->delete();
        return redirect()->route('product.list');
    }
}
