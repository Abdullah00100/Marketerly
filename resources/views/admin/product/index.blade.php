@extends('layouts.admin')

@section('content')

<div class="container-fluid">
    <div class="card">
        <div class="card-header" style="padding:7px;">
            <h4>Products List</h4>
            <a href="products/create" type="button" class="btn btn-info">Add Product</a>

            <hr>


        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Description</th>
                        <th>Original Price</th>
                        <th>Selling Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->Category->name}}</td>
                            <td>{{$item->small_description}}</td>
                            <td>{{$item->original_price}}</td>
                            <td>{{$item->selling_price}}</td>
                            <td>
                            <form action="products/{{$item->id}}" method="post">
                                @csrf
                                @method('DELETE')
                                <a href="products/{{$item->id}}/edit" class="btn btn-primary">Edit</a>
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


</div>

@endsection