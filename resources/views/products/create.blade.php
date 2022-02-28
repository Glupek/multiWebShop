@extends('layouts/master')

@section('content')
<section id="productsCreate" class="container">
   <div class="row">
       <div class="col-md-12">
           <h1>Add a product</h1>
           <p>Here you can add a product</p>
       </div>
   </div>
</section>

<div id="addProductForm" class="container">
   <div class="row">
       <div class="col-md-12">

           <form action="{{ route('products.store') }}" method="POST" >
            @csrf
               <div class="form-group row">
                   <label for="product_name" class="col-sm-2 col-form-label">Title of the product</label>
                   <div class="col-sm-10">
                       <!-- the name attribute is very important and corresponds with the name of the column in the database -->
                       <input name="product_name" type="text" class="form-control-plaintext" id="product_name" placeholder="Product title">
                   </div>
               </div>
               <div class="form-group row">
                   <label for="excerpt" class="col-sm-2 col-form-label">excerpt</label>
                   <div class="col-sm-10">
                       <input name="excerpt" type="text" class="form-control-plaintext" id="excerpt" placeholder="excerpt">
                   </div>
               </div>
               <div class="form-group row">
                <label for="product_description" class="col-sm-2 col-form-label">product_description</label>
                <div class="col-sm-10">
                    <input name="product_description" type="text" class="form-control-plaintext" id="product_description" placeholder="product_description">
                </div>
            </div>
            
            <div class="form-group row">
                <label for="category_id" class="col-sm-2 col-form-label">category_id</label>
                <div class="col-sm-10">
                    <input name="category_id" type="integer" class="form-control-plaintext" id="category_id" placeholder="category_id">
                </div>
            </div>
            <div class="form-group row">
                <label for="price" class="col-sm-2 col-form-label">price</label>
                <div class="col-sm-10">
                    <input name="product_price" type="integer" class="form-control-plaintext" id="price" placeholder="price">
                </div>
            </div>
            <div class="form-group row">
                <label for="quantity" class="col-sm-2 col-form-label">quantity</label>
                <div class="col-sm-10">
                    <input name="quantity" type="decimal" class="form-control-plaintext" id="quantity" placeholder="quantity">
                </div>
            </div>
            <div class="form-group row">
                <label for="product_image" class="col-sm-2 col-form-label">product_image</label>
                <div class="col-sm-10">
                    <input name="product_image" type="text" class="form-control-plaintext" id="product_image" placeholder="https://">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Add product</button>
            </div>              
        </form>

    </div>
</div>
</div>
@endsection

