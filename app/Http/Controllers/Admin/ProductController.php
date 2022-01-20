<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = Product::paginate(5);
        $search = $request->search;
        $products = Product::select('*');

        if ($search ){
            $products = $products->where('price','like','%'.$search.'%'); 
        }
        $products = $products->paginate(5);

        return view ('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::orderBy('id', 'desc')->get();
        return view('admin.products.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|unique:products|max:150',
                'image' => 'required',
                'price' => 'required|numeric|min:0|not_in:0',
            ],
            [
                'name.unique' => 'Tên sản phẩm đã có',
                'name.required' => 'Phải có tên sản phẩm',
                'image.required' => 'Phải có ảnh sản phẩm',
                'price.required' => 'Giá phải lớn hơn 0 đồng',
            ]
        );
        $product = new Product();
        $product->code = "CF01";
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->image = $request->input('image');
        $product->category_id = $request->input('category_id');

        if ($request->hasFile('image'))
        {
            $get_image          = $request->image;
            $path               ='storage/app/public/images/';
            $get_name_image     = $get_image->getClientOriginalName();
            $name_image         = current(explode('.', $get_name_image));
            $new_image          = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move($path, $new_image);
            $product->image       = $new_image;
        }

        $product->save();
        return redirect()->route('products.index')->with('status','Tạo mới sản phẩm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        $category = Category::orderBy('id', 'DESC')->get();
        return view('admin.products.view',compact('product','category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $category = Category::orderBy('id', 'DESC')->get();
        return view('admin.products.edit',compact('product','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'name' => 'required|unique:products,name,'.$id.'|max:255',
                'price' => 'required|numeric|min:0|not_in:0',
            ],
            [
                'name.unique' => 'Tên sản phẩm đã có',
                'name.required' => 'Phải có tên sản phẩm',
                'price.required' => 'Giá phải lớn hơn 0 đồng',
            ]
        );
        $product = Product::find($id);
        $product->code = "CF01";
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->category_id = $request->input('category_id');

        $get_image = $request->image;
        if ($request->hasFile('image')) {
            $path ='storage/app/public/images/'.$product->image;
            $path ='storage/app/public/images/';
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move($path,$new_image);
            $product->image = $new_image;
            $data['product_image'] =$new_image;
        }

        $product->save();
        return redirect()->route('products.index')->with('status','Cập nhật sản phẩm thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')->with('status','Xóa sản phẩm thành công');
    }

 
}
