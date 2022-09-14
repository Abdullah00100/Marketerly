@extends('admin.admin_layouts.app')

@section('content')

<div class="container-fluid">
    <div class="card">
        <div class="card-header" style="padding:7px;">
            <h4>Categories List</h4>
            <a href="categories/create" type="button" class="btn btn-info">Add Category</a>

            <hr>


        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->description}}</td>
                            <td>
                            <form action="categories/{{$item->id}}" method="post">
                                @csrf
                                @method('DELETE')
                                <a href="categories/{{$item->id}}/edit" class="btn btn-primary">Edit</a>
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