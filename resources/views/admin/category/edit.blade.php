@extends('layouts.admin')

@section('content')

<div class="container-fluid">
    <h1>Edit Category</h1>

    <form action="/categories/{{$category->id}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-6" style="margin-bottom:6px ;">
                <label for="">Name</label>
                <input class="form-control" type="text" name="name" id="" value="{{$category->name}}">
            </div>
            <div class="col-md-6" style="margin-bottom:6px ;">
                <label for="">Slug</label>
                <input class="form-control" type="text" name="slug"value="{{$category->slug}}">
            </div>
            <div class="col-md-12" style="margin-bottom:6px ;">
                <label for="">Description</label>
                <textarea class="form-control" name="description" rows="3">{{$category->description}}</textarea>
            </div>
            <div class="col-md-6"  style="margin-bottom:6px;">
                <label for="">Status</label>
                <input type="checkbox" name="Status" value="1" {{$category->status == "1" ? 'checked' : ''}}>
            </div>
            <div class="col-md-6" style="margin-bottom:6px ;">
                <label for="">Popular</label>
                <input  type="checkbox" name="Popular" value="1" {{$category->popular == "1" ? 'checked' : ''}}>
            </div>
            <div class="col-md-12" style="margin-bottom:6px ;">
                <label for="">Meta Title</label>
                <textarea class="form-control" name="meta_title" rows="3">{{$category->meta_title}}</textarea>
            </div>
            
            <div class="col-md-12" style="margin-bottom:6px ;">
                <label for="">Meta Keywords</label>
                <textarea class="form-control" name="meta_keywords" rows="3">{{$category->meta_keywords}}</textarea>
            </div>
            <div class="col-md-12" style="margin-bottom:6px ;">
                <label for="">Meta Description</label>
                <textarea class="form-control" name="meta_descrip" rows="3">{{$category->meta_descrip}}</textarea>
            </div>
            
            <div class="col-md-6" style="margin-bottom:6px ;">
                <label for="">Image</label>
                <input class="form-control" name="image" type="file">
            </div>

            <div class="col-md-6" style="text-align:center ;">
                @if($category->image)
                <img style="width:150px;height:150px;margin-top:7px;border-radius: 30%;;" src="{{asset('assets/uploads/categories/'. $category->image)}}" alt="">
                @endif
            </div>
            <div class="col-md-6" style="margin-top:6px ;">
                <button class="btn btn-primary" type="submit">Submit</button>
                <a class="btn btn-primary-dark" href="/categories">Cancel</a>
            </div>
           
        </div>

    </form>
</div>

@endsection