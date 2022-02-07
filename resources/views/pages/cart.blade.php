@extends('layouts.app')
@section('content')
  <div class="row">
      <div class="col-sm-9">
           <h3>Cart</h3>
           <!-- check if there item on the cart -->
           @if(Cart::count() > 0)
              @foreach (Cart::content() as $prod)
                  <div class="cart cart-header">
                     <h4>{{ $prod->model->name }}</h4>
                  </div>
                  <div class="cart cart-body">
                    <img src="/storage/images/{{ $prod->model->picture }}" style="width:100px;height:100px;">
                    <p>{{ $prod->model->description }}</p>
                     <div>
                          <form action="/cart/{{ $prod->rowId }}" method="POST">
                             @csrf
                            <input type="hidden" name="_method" value="delete">
                            <button type="submit" class="btn btn-danger">Remove Item From Cart</button>
                        </form>
                      </div>
                  </div>
             @endforeach
             <div class="cart cart-footer">
                    <table class="table table-striped">
                         <tr>
                             <td class="column">Sub Total</td>
                             <td class="column">{{ Cart::subtotal() }}</td>
                         </tr>
                          <tr>
                              <td>
                                   <form action="/cart_remove/{{ $prod->id }}" method="POST">
                                     @csrf
                                     <input type="hidden" name="_method" value="delete">
                                     <button type="submit" class="btn btn-warning">Remove All Items From Cart</button>
                                   </form>
                              </td>
                                <td>
                                    <a href="/checkout" class="btn btn-success">Proceed With The Payment</a>
                                </td>
                          </tr>
                       </table>
                 </div>
           @else
              <h3>There are no items on the cart</h3>
           @endif
      </div>
      <div class="col-sm-3">
          test
      </div>
  </div>
@endsection