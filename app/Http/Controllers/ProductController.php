<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;


class ProductControler extends Controller
{
    public function index(){
        $data = Product::with('category')->get();
        return view('admin.product.index', compact('data'));
    }


    public function create(){
        $category = Category::all();
        return view('admin.product.create', compact('category'));
    }

    public function store (Request $request){
        $request->validate([
            'title' => 'required',
            'category_id' => 'required|numeric',
            'harga' => 'required|numeric',
            'body' => 'required',
            'image' => 'required|image|mimes: jpg, jpng, jpeg'
        ]);
        $image_file = time().'.'.$request->image->extension();
        Product::create([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'slug' => str_replace(' ', '-', $request->title),
            'harga' => $request->harga, 
            'body' => $request->body, 
            'image' => $image_file
        ]);
        $request->image->move(public_path('image'), $image_file);
        return redirect()->route('admin.product.index')->with('success', 'New Product Hass Been Added');
    }

    public function edit($id){
        $category = Category::all();
        $data = Product::findorfail($id);
        return view('admin.product.edit', compact('data', 'category'));
    }
}
