@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="row mt-2">
          <div class="col-6 offset-3">
            <h3>Update Product</h3>
              <form action="/admin/product/{{$product->id}}/update" method="POST" enctype="multipart/form-data">
                 @csrf
                 <input type="hidden" name="_method" value="PATCH">
                 <div class="form-group">
                   <label for="name">Enter Product Name</label>
                  <input type="text" name="name" value="{{$product->name}}"     class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="name">Enter Product Description</label>
                    <textarea name="description" id="" cols="30" rows="5" class="form-control">
                      {{ $product->description }}
                    </textarea>
                   </div>
                   <div class="form-group">
                     <label for="name">Enter Product Price</label>
                     <input type="text" name="price"  value="{{$product->price}}" class="form-control">
                   </div>
                   <div class="form-group">
                     <label for="name">Please Upload Product Picture</label>
                     <input type="file" name="picture" class="form-control">
                   </div>
                   <div class="form-row">
                       <button type="submit" class="btn btn-default">save product</button>
                   </div>
                </form>
           </div>
        </div>
    </div>
 </div>
@endsection