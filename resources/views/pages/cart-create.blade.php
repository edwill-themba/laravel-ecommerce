@extends('layouts.app')
@section('content')
   <div class="row">
        <div class="col-sm-9">
          <div class="prod-info">
           <h3>{{$product->name}}</h3>
            <p>
              EVOX 5XL Formidable Mass; Designed for individuals with fast metabolisms and users which aim to gain muscle mass. 5XL Formidable Mass delivers high caloric quality macro nutrients per serving, assisting your body's muscle tissue breakdown by keeping a positive nitrogen state. Our superior Formidable Mass Matrix Proprietary Blend ensures your body will be primed for the next workout. EVOX 5XL Formidable Mass contains growth potentiators of Vitargo, Creatine Monohydrate, L-Glutamine, Taurine, Glutamine Peptides, Arginine Alpha Ketoglutarate, Beta Alanine, Branched Chain Amino Acids 2:1:1, Tribulus Terrestris Extract 40% Steroidal Saponins, Calcium Hydroxy Methyl Butarate.
              Formidable Mass Matrix IngredientsCreatine is a natural compound found in the body. Creatine increases ATP and energy levels.
              Tribulus is a herb that has been suggested for its muscle-building, strength increasing and overall well being promoting characteristics which result from it's ability to encourage natural testosterone production.
              HMB(beta-hydroxybuturate) is a metabolite of the branched chain amino acid Leucine. Leucine plays a role in protein by minimizing protein breakdown in muscles after exercise. 
            </p>
         </div>
        </div>
        <div class="col-sm-3">
          <div class="proceed-add-to-cart">
           <form action="{{route('cart.store')}}" method="POST">
            @csrf
              <h3>Buy this Product</h3>
                <div class="prod-picture">
                  <img src="/storage/images/{{$product->picture}}">
                </div>
                  <h3>{{ $product->name }}</h3>
                  <input type="hidden" name="product_id" value="{{ $product->id }}">
                  <input type="hidden" name="name" value="{{ $product->name }}">
                  <input type="hidden" name="description" value="{{ $product->description }}">
                  <input type="hidden" name="price" value="{{ $product->price }}">
                  <div class="form-row">
                    <button type="submit" class="btn btn-warning">Proceed Add To Cart</button>
                  </div>
            </form>
           </div>
        </div>
    </div>
@endsection