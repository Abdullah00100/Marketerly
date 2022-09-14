@extends('admin.admin_layouts.app')

@section('content')

<div class="container-fluid">
    <h1>Add Category</h1>

    <form action="/categories" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6" style="margin-bottom:6px ;">
                <label for="">Name</label>
                <input class="form-control" type="text" name="name" id="">
            </div>
            <div class="col-md-6" style="margin-bottom:6px ;">
                <label for="">Slug</label>
                <input class="form-control" type="text" name="slug">
            </div>
            <div class="col-md-12" style="margin-bottom:6px ;">
                <label for="">Description</label>
                <textarea class="form-control" name="description" rows="3"></textarea>
            </div>
            <div class="col-md-6"  style="margin-bottom:6px;">
                <label for="">Status</label>
                <input type="checkbox" name="Status" value="1" checked>
            </div>
            <div class="col-md-6" style="margin-bottom:6px ;">
                <label for="">Popular</label>
                <input  type="checkbox" name="Popular" value="1" checked>
            </div>
            <div class="col-md-12" style="margin-bottom:6px ;">
                <label for="">Meta Title</label>
                <textarea class="form-control" name="meta_title" rows="3"></textarea>
            </div>
            
            <div class="col-md-12" style="margin-bottom:6px ;">
                <label for="">Meta Keywords</label>
                <textarea class="form-control" name="meta_keywords" rows="3"></textarea>
            </div>
            <div class="col-md-12" style="margin-bottom:6px ;">
                <label for="">Meta Description</label>
                <textarea class="form-control" name="meta_descrip" rows="3"></textarea>
            </div>
            <div class="col-md-12" style="margin-bottom:6px ;">
                <label for="">Image</label>
                <input class="form-control" name="image" type="file">
            </div>
            <div class="col-md-12" style="margin-top:6px ;">
                <button class="btn btn-primary" type="submit">Submit</button>
                <a class="btn btn-primary-dark" href="/categories">Cancel</a>
            </div>
        </div>

    </form>
</div>

@endsection