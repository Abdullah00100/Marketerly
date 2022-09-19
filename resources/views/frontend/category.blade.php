@extends('layouts.front')

@section('title')
Category
@endsection

@section('content')

<div class="py-5"style="margin-top:40px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 style="text-align:center;">All Categories</h1>
                <div class="row mt-6">
                    @foreach($categories as $item)
                    <div class="col-md-3 mb-3">
                        <a href="/view-category/{{$item->slug}}">
                            <div class="card">
                                <img style="height:260px;" src="{{asset('assets/uploads/categories/'. $item->image)}}" alt="">
                                <div class="card-body">
                                    <h5>{{$item->name}}</h5>
                                    <p>{{$item->description}}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection