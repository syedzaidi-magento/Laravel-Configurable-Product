@extends('layouts.app')

@section('content')
        <br> <br>
        <div class="row">
            <div class="col-sm">
            </div>
            <div class="col-sm">
            </div>
            <div class="col-sm">
                <a href="{{ route('products.create') }}" >
                    <button class="btn btn-primary">Create Product</button>
                </a>
            </div>
        </div>
        <br><br>
    <div class="table-responsive">
    <table class="table table-striped">
    <thead>
    <tr>
        <th>Delete</th>
        <th>ID #</th>
        <th>Name</th>
        <th>Sku</th>
        <th>Price</th>
        <th>Created At</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($products as $product)
        <tr>
            <th scope="row">
                <form method="POST" action="{{ route('products.destroy', $product) }}" id="deleteForm">
                    @csrf
                    @method('DELETE')
                    <a><button class="btn btn-danger btn-sm">X</button></a>
                </form>
            </th>
            <th scope="row">{{$product->id}}</th>
            <td>{{$product->name}}</td>
            <td>{{$product->sku}}</td>
            <td>${{$product->price}}</td>
            <td>{{$product->created_at->toDayDateTimeString()}}</td>
            <td>
                <a href="{{ route('products.edit', $product->id) }}" ><button class="btn btn-primary btn-sm">Edit</button></a>
                <a href="{{ route('products.show', $product->id) }}" ><button class="btn btn-info btn-sm">Detail</button></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>
@endsection
