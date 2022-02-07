<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Cart;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('pages.cart');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     try{
         $product_id = $request->input('product_id');
         $qty = 1;
         $name = $request->input('name');
         $description = $request->input('description');
         $price = $request->input('price');
         Cart::add($product_id,$name, 1,$price)->associate('App\Models\Product');
         return redirect('/carts');
        }catch(CartAlreadyStoredException $ex){
           return redirect()->back()->with('error_message',$ex->getMessage());
       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::remove($id);
        return redirect()->back()->with('success_message','Item romoved from the cart');
    }
    
    /**
     * Remove all specified resource from storage.
     * 
     * @return \Illuminate\Http\Response
     */
    public function destroyAll($id)
    {
        Cart::destroy();
        return redirect()->back()->with('success_message','All items romoved form the cart');
    }
}
