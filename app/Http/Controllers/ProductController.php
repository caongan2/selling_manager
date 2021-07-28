<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Categories;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Products::paginate(8);
        $categories = Categories::all();
        session()->put('product');
        session()->put('category');
        return view('admin.products.products.list', compact('products', 'categories'));
    }

    public function productByCategory($id)
    {
        $products = Products::where('category_id', $id)->paginate(8);
        return view('admin.products.products.list', compact('products'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Categories::all();
        return view('admin.products.products.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request, Products $product)
    {
        $path = $request->file('image')->store('image', 'public');
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->category_id = $request->input('category');
        $product->image = $path;
        $product->save();
        toastr()->success('Thêm sản phẩm thành công', 'Success');
        return redirect()->route('product.list');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product_key = 'product_' . $id;
        if (!session()->has($product_key)) {
            Products::where('id', $id)->increment('view_count');
            session()->put($product_key, 1);
        } else {
            Products::where('id', $id)->increment('view_count');
            session()->put($product_key, 1);
        }

        $product = Products::find($id);
        return view('admin.products.products.details', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products = Products::all();
        $product = DB::table('products')->where('id', $id)->get()->first();
        $categories = DB::table('categories')->get();
        return view('admin.products.products.update', compact('product', 'products', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        $path = $request->file('image')->store('images', 'public');
        $data = [
            'name' => $request->name,
            'price' => $request->price,
            'category_id' => $request->category,
            'image' => $path
        ];
        DB::table('products')->where('id', $id)->update($data);
        toastr()->success('Update thành công', 'Success');
        return redirect()->route('product.list');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Products::destroy('id', $id);
        return redirect()->route('product.list');
    }

    public function search(Request $request)
    {
        $text = $request->search;
        $products = Products::where('name', 'LIKE', '%' . $text . '%')->get();

        toastr()->success('n kết quả');
        return view('admin.products.products.search', compact('products'));
    }
}
