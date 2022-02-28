@extends('layouts/master')
 
@section('content')
<section id="productsEdit" class="container mt-5">
   <div class="row">
       <div class="col-md-12">
           <h1>Edit {{ $product->product_name }}</h1>
           <p>On this page you can edit a product.</p>
       </div>
   </div>
</section>
 
<div id="editproductForm" class="container my-5">
   <div class="row">
       <div class="col-md-12">
 
           <form action="{{ route('products.update', $product) }}" method="POST">
               @csrf
               @method('PUT')
               <div class="form-group row">
                   <label for=product_name" class="col-sm-2 col-form-label">Naam van het product</label>
                   <div class="col-sm-10">
                       <!-- the name attribute is very important and corresponds with the name of the column in the database -->
                       <input name="title" type="text" class="form-control-plaintext" id=product_name" placeholder="product_name"
                           value="{{ $product->product_name }}">
                   </div>
               </div>
               <div class="form-group row">
                   <label for="excerpt" class="col-sm-2 col-form-label">excerpt</label>
                   <div class="col-sm-10">
                       <input name="excerpt" type="text" class="form-control-plaintext" id="excerpt" placeholder="excerpt"
                           value="{{ $product->excerpt }}">
                   </div>
               </div>
               <div class="form-group row">
                   <label for="product_description" class="col-sm-2 col-form-label">beschrijving</label>
                   <div class="col-sm-10">
                       <input name="product_description" type="text" class="form-control-plaintext" id="product_description" placeholder="product_description"
                           value="{{ $product->product_description }}">
                   </div>
               </div>
               <div class="form-group row">
                   <label for="product_image" class="col-sm-2 col-form-label">Afbeelding</label>
                   <div class="col-sm-10">
                       <input name="product_image" type="text" class="form-control-plaintext" id="product_image"
                           value="{{ $product->product_image }}">
                   </div>
               </div>                 
               <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                   <button type="submit" class="btn btn-primary">Update product</button>
               </div>              
           </form>
 
       </div>
   </div>
</div>
@endsection