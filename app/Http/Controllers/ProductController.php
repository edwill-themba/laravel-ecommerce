<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(6);
        return view('pages.shop')->with('products',$products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.admin');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
          'name'         => 'required|min:3|max:100',
          'description'  => 'required|min:3|max:191',
          'price'        => 'required|numeric',
          'picture'      => 'image|nullable|max:1999'
        ]);
        
        //check if there is an image to be uploaded
        if($request->hasFile('picture')){
         // get the full file name
         $filename = $request->file('picture')->getClientOriginalName();
         // file name without extension
         $filenameWithoutExt = pathinfo($filename,PATHINFO_FILENAME);
         // get the extension
         $extension = $request->file('picture')->getClientOriginalExtension();
         // file to be uploaded
         $fileTobeUploaded = $filename.'_'.time().'.'.$extension;
         //  store file
         $path = $request->file('picture')->storeAs('/public/images/',$fileTobeUploaded);
        }else{
         $fileTobeUploaded = 'no_picture.jpg';
        }

        $product = new Product;
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->picture = $fileTobeUploaded;
        $product->save();
        return redirect('/products')->with('success_message','products added successfully');
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
        return view('pages.cart-create')->with('product',$product);
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
        return view('admin.update-product')->with('product',$product);
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
        $this->validate($request,[
            'name'         => 'required|min:3|max:100',
            'description'  => 'required|min:3|max:191',
            'price'        => 'required|numeric',
            'picture'      => 'image|nullable|max:1999'
          ]);
          
          //check if there is an image to be uploaded
          if($request->hasFile('picture')){
           // get the full file name
           $filename = $request->file('picture')->getClientOriginalName();
           // file name without extension
           $filenameWithoutExt = pathinfo($filename,PATHINFO_FILENAME);
           // get the extension
           $extension = $request->file('picture')->getClientOriginalExtension();
           // file to be uploaded
           $fileTobeUploaded = $filename.'_'.time().'.'.$extension;
           //  store file
           $path = $request->file('picture')->storeAs('/public/images/',$fileTobeUploaded);
          }else{
           $fileTobeUploaded = 'no_picture.jpg';
          }
  
          $product = Product::find($id);
          $product->name = $request->input('name');
          $product->description = $request->input('description');
          $product->price = $request->input('price');
          $product->picture = $fileTobeUploaded;
          $product->save();
          return redirect('/products')->with('success_message','products updated added successfully');
      
  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect('/products')->with('success_message','products deleted successfully');
    }
}
