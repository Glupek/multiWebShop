@extends('layouts/master')

@section('content')
<section id="productsShow" class="container mt-5">

   <div class="row">
       <div class="col-md-12">
           <h1><strong>{{ $product->product_name }}</strong></h1>
           <h4>${{ $product->product_price }}</h4>
           <p>{{ $product->product_description }}</p>
           <img src="{{ $product->product_image }}" alt="{{ $product->product_name }} by {{ $product->quantity }}">
       </div>
   </div>
   <div class="col-md-2">
    <form action="{{ route('products.destroy', $product->product_id) }}" method="POST">
        @csrf
        @method('DELETE')
        @can('product_delete')
        <button type="submit" title="delete" class="btn btn-danger">Delete</button>
        @endcan
    </form>
    @can('product_edit')
    <a href="{{ route('products.edit', $product->product_id) }}" type="submit" title="delete" class="btn btn-primary">
        Edit
    </a>
    @endcan

</div>
</div>

</section>

</section>
@endsection

