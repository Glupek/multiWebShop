@extends('layouts.master')

@section('content')
<div class="cont">
    <div class="row">
        <div class="col-md-6">
            <table class="table table-bordered">
                <tr>
                 <th scope="col">naam</th>
                 <th scope="col">prijs</th>
                 <th scope="col">aantal</th>
                 <th scope="col">subtotaal</th>
                 <th scope="col">update/delete</th>
                </tr>
                 @foreach (Cart::content() as $cart )
                 <tr>
                     <td>
                         {{ $cart->name }} 
                     </td>
                     <td> {{ $cart->price }}</td>
                     <td><input type="number" class="form-control text-center" value="{{  $cart->qty  }}"></td>
                     <td>{{ $cart->subtotal }} </td>
                    <td>
                        <form action="{{ route('cart.update', $cart->rowId) }}">
                        
                        <input type="submit" value="delete">

                        </form>
                    </td>
                       
                 </tr>
                     
                 @endforeach
             </table>
        </div>
        <div class="col-md-4 ">
            <h5>Subtotaal</h5>
            <p>${{ Cart::subtotal() }}</p>
            <hr>
            <h6>BTW</h6>
            <p>${{ Cart::tax() }}</p>
            <hr>
            <h3>Totaal</h3>
            <p>${{ Cart::total() }}</p>
        </div>
    </div>
   
</div>


@endsection

