@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            @if (count($products) > 0 )
                 <div class="show-products">
                     <!-- loop true products -->
                     @foreach ($products as $product)
                        <div>
                          <h4>{{ $product->name }}</h4>
                           <img src="/storage/images/{{$product->picture}}">
                           <p><span>R{{ $product->price }}</span></p> 
                           <p><a href="/product/{{$product->id}}" class="btn btn-primary btn-add-to-cart">Add To Cart</a></p>
                            @if (!Auth::guest() && Auth::user()->id == 2)
                                <table class="table table-striped">
                                    <tr>
                                        <td>
                                          <a href="/admin/product/{{$product->id}}" class="btn btn-warning">Update</a>
                                        </td>
                                        <td>
                                            <form action="/admin/product/{{$product->id}}/delete" method="POST">
                                                @csrf
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="submit" value="delete" class="btn btn-danger">
                                            </form>
                                        </td>
                                    </tr>
                                </table>
                            @endif
                         </div> 
                     @endforeach
                 </div>
             @else
                <h3>There are no products found</h3>
             @endif
             <div class="paginate">
                {{ $products->links() }}
             </div>
        </div>
    </div>
@endsection