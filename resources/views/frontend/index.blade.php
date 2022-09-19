@extends('layouts.front')

@section('title')
Welcome to Marketerly
@endsection

@section('content')
@include('layouts.inc.slider')

<div class="py-5">
    <div class="container">
        <div class="row">
            <h2 style="text-align: center;">Feature Products</h2>
            <div class="owl-carousel product-carousel owl-theme mt-3">
                @foreach($featured_products as $item)
                    <div class="item">
                        <a href="/category/{{$item->category->slug}}/{{$item->slug}}">
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
            <hr>

        </div>
    </div>
</div>

<div class="py-1">
    <div class="container">
        <div class="row">
            <h2 style="text-align: center;">Trending Categories</h2>
            <div class="owl-carousel product-carousel owl-theme mt-3">
                @foreach($trending_categories as $item)
                    <div class="item">
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
@section('scripts')
<script>
    $('.product-carousel').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        dots:false,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 4
            }
        }
    })
</script>
@endsection
@endsection