<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\product\productRequest;
use App\Models\category;
use App\Models\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listproduct = product::join('categories', 'category_id', 'categories.id')->select('products.*', 'categories.name_category as namecate')->get();
        $category = category::all();
        return view('admin.page.product.index', compact('listproduct','category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = category::all();
        return view('admin.page.product.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(productRequest $request)
    {
        $data = $request->all();
        product::create($data);
        toastr()->success("Created product successfully!");
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $listproduct = product::find($id);
        if($listproduct){
            return response()->json(["data" => $listproduct]);
        }else {
            toastr()->error("listproduct does not exits");
            return $this->index();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(productRequest $request)
    {
        $data = $request->all();
        $product = product::find($request->id);
        $product->update($data);
        return response()->json(['status' => true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product)
    {
        //
    }
    public function delete($id)
    {
        $product = product::find($id);
        if($product){
            $product->delete();
            return response()->json(['status' => true]);
        } else {
            return response()->json(['status' => false]);
        }
    }
}
