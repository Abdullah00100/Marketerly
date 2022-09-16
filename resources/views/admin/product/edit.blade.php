@extends('layouts.admin')

@section('content')

<div class="container-fluid">
    <h1>Edit Product</h1>

    <form action="/products/{{$product->id}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">

            <div class="col-md-12" style="margin-bottom:30px ;">
                <label for="">Category</label>
                <select class="form-control" name="cate_id">
                    <option value="{{$product->cate_id}}">{{$product->category->name}}</option>
                    @foreach($categories as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-6" style="margin-bottom:6px ;">
                <label for="">Name</label>
                <input class="form-control" value="{{$product->name}}" type="text" name="name" id="">
            </div>
            <div class="col-md-6" style="margin-bottom:6px ;">
                <label for="">Slug</label>
                <input class="form-control" value="{{$product->slug}}" type="text" name="slug">
            </div>
            <div class="col-md-12" style="margin-bottom:6px ;">
                <label for="">Small Description</label>
                <textarea class="form-control" name="small_description" rows="3">{{$product->small_description}}</textarea>
            </div>
            <div class="col-md-12" style="margin-bottom:6px ;">
                <label for="">Description</label>
                <textarea class="form-control"  name="description" rows="3">{{$product->description}}</textarea>
            </div>
            <div class="col-md-6" style="margin-bottom:6px ;">
                <label for="">Original Price</label>
                <input class="form-control" value="{{$product->original_price}}" name="original_price" type="number">
            </div>
            <div class="col-md-6" style="margin-bottom:6px ;">
                <label for="">Selling Price</label>
                <input class="form-control" value="{{$product->selling_price}}" name="selling_price" type="number">
            </div>
            <div class="col-md-6" style="margin-bottom:6px ;">
                <label for="">Tax</label>
                <input class="form-control" value="{{$product->tax}}" name="tax" type="number">
            </div>
            <div class="col-md-6" style="margin-bottom:6px ;">
                <label for="">Quantity</label>
                <input class="form-control" value="{{$product->qty}}" name="qty" type="number">
            </div>
            <div class="col-md-6"  style="margin-bottom:6px;">
                <label for="">Status</label>
                <input type="checkbox" name="status" value="1" {{$product->status == "1" ? 'checked' : ''}}>
            </div>
            <div class="col-md-6" style="margin-bottom:6px ;">
                <label for="">Trending</label>
                <input  type="checkbox" name="trending" value="1" {{$product->trending == "1" ? 'checked' : ''}}>
            </div>
            
            <div class="col-md-12" style="margin-bottom:6px ;">
                <label for="">Meta Title</label>
                <textarea class="form-control"  name="meta_title" rows="3">{{$product->meta_title}}</textarea>
            </div>
            
            <div class="col-md-12" style="margin-bottom:6px ;">
                <label for="">Meta Keywords</label>
                <textarea class="form-control" name="meta_keywords" rows="3">{{$product->meta_keywords}}</textarea>
            </div>
            <div class="col-md-12" style="margin-bottom:6px ;">
                <label for="">Meta Description</label>
                <textarea class="form-control" name="meta_descrip" rows="3">{{$product->meta_description}}</textarea>
            </div>
            <div class="col-md-6" style="margin-bottom:6px ;">
                <label for="">Image</label>
                <input class="form-control" name="image" type="file">
            </div>
            <div class="col-md-6" style="text-align:center ;">
                @if($product->image)
                <img style="width:150px;height:150px;margin-top:7px;border-radius: 30%;;" src="{{asset('assets/uploads/products/'. $product->image)}}" alt="">
                @endif
            </div>
            <div class="col-md-12" style="margin-top:6px ;">
                <button class="btn btn-primary" type="submit">Submit</button>
                <a class="btn btn-primary-dark" href="/products">Cancel</a>
            </div>
        </div>

    </form>
</div>

@endsection