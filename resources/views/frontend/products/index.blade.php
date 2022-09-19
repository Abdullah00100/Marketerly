@extends('layouts.front')

@section('title')
Products of {{$category->name}}
@endsection

@section('content')
<div style="margin-top:70px;" class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h6 class="mb-0">Collection / {{$category->name}}</h6>
    </div>
</div>
<div class="py-5">
    <div class="container">
        <div class="row">
            <h2 style="text-align: center;">{{$category->name}}' Products</h2>
                @foreach($products as $item)
                    <div class="col-md-3 mb-3">
                        <a href="/category/{{$category->slug}}/{{$item->slug}}">
                            <div class="card">
                                <img style="height:260px;" src="{{asset('assets/uploads/products/'. $item->image)}}" alt="">
                                <div class="card-body">
                                    <h5>{{$item->name}}</h5>
                                    <span class="float-start">{{$item->selling_price}} $</span>
                                    <span class="float-end"><s>{{$item->original_price}} $</s></span>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach


        </div>
    </div>
</div>
@endsection
