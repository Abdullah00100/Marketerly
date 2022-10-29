@extends('layouts.front')

@section('title')
    My Cart
@endsection

@section('content')
<div style="margin-top:70px;" class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h6 class="mb-0">
            <a href="{{url('/')}}">
                Home 
            </a> /
            <a href="{{url('Cart')}}">
                Cart
            </a> 
        </h6>
    </div>
</div>

<div class="container my-5">
    <div class="card shadow">
        <div class="card-body">
            @if($cart_items->count())
            @foreach ($cart_items as $item) 
                <div class="row product_data" style="align-items: center;">
                    <div class="col-md-2">
                        <img src="{{asset('assets/uploads/products/'.$item->product->image)}}" style="height: 70px; width:70px;" alt="">
                    </div>
                    <div class="col-md-5">
                        <h6>{{$item->product->name}}</h6>
                    </div>
                    <div class="col-md-3">
                        <input type="hidden" class="prod_id" value="{{$item->prod_id}}">
                        <label for="Quantity">Quantity</label>
                        <div class="input-group text-center mb-3" style="width:130px;">
                            <button class="input-group-text decrement-btn">-</button>
                            <input type="text" value="{{$item->prod_qty}}" class="form-control qty-input" name="quantity">
                            <button class="input-group-text increment-btn">+</button>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-danger delete-cart-item"><i class="bi bi-trash-fill"></i> Remove </button>
                    </div>
                </div>
                <hr>
            @endforeach
           
                
            @else
            <h1 style="text-align: center; color:rgb(16, 171, 171); ">Your Cart is Empty</h1>
            @endif
            
        </div>
    </div>
</div>
<script src="{{asset('frontend/js/jquery-3.6.1.min.js')}}"></script>

@endsection