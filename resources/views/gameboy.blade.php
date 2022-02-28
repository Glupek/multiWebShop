@extends('layouts.master')

@section('content')

<section id="productsGameboy" class="container mt-5">

    
    @if (session('msg'))
       <div> {{ session('msg') }}</div>
    @endif

    <div class="row">
        <div class="col-md-12">
            <h1>Nintendo</h1>
            <p>Al onze Nintendo producten</p>
        </div>
    </div>
    
    <div class="row">
     @forelse ($products as $product)
         <div id="mijnCard" class="col-md-3 mb-3">
             <div  class="card">
                 <h5 class="card-header">{{ $product->product_name }}</h5>
                 <img class="card-img-top" src="{{ $product->product_image }}" alt="{{ $product->product_name }}">
                 <div class="card-body">
                     <h5 class="card-title">{{ $product->product_name }}</h5>
                     <p class="card-text">{{ $product->excerpt }}</p>
                     <p>{{ $product->quantity }}</p>
                     <p>${{ $product->product_price }}</p>
                     <a href="/products/{{ $product->product_id }}" class="btn btn-primary">Read more</a>
                     <div>
                         @if($cart->where('id',$product->product_id)->count())
                         Reeds in mandje
                         @else
                         <form action="{{  route('cart.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->product_id }}">
                        <input type="number" value="1" name="quantity" class="text-sm sm:text-base px-2 pr-2 rounded-lg border border-gray-400 py-1 focus:outline-none focus:border-blue-400">
                        <button type="submit" class="btn btn-warning"> Voeg toe aan mandje</button>
                        </form>
                        @endif
                     </div>
                 </div>
             </div>
         </div>
     @empty
     No products found.
     @endforelse
 </div>

</section>
@endsection