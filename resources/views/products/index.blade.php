@extends('layouts/master')

@section('content')
   <section id="productsCreate" class="container mt-5">

       @if ($message = Session::get('success'))
           <div class="row">
               <div class="col-md-12">
                   <div class="alert alert-success">
                       <p>{{ $message }}</p>
                   </div>           
               </div>
           </div>
       @endif

       <div class="row">
           <div class="col-md-12">
               <h1>Onze producten</h1>
               <p>Hier een lijst van al onze producten.</p>
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
                    </div>
                </div>
            </div>
        @empty
        No products found.
        @endforelse
    </div>
 
   </section>
@endsection
