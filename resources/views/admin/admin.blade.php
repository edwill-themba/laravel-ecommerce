@extends('layouts.app')
@section('content')
   <div class="row">
       <div class="col-sm-12">
           <div class="row mt-2">
             <div class="col-6 offset-3">
               <h3>Add Product</h3>
                 <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label for="name">Enter Product Name</label>
                     <input type="text" name="name" class="form-control">
                     </div>
                     <div class="form-group">
                       <label for="name">Enter Product Description</label>
                       <textarea name="description" id="" cols="30" rows="5" class="form-control">
                       </textarea>
                      </div>
                      <div class="form-group">
                        <label for="name">Enter Product Price</label>
                        <input type="text" name="price" class="form-control">
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