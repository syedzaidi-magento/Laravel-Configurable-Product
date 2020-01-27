@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h1>Create Product</h1>
            <form method="POST" action="/public/products">
            @csrf
                <div class="form-group">
                <label for="name">Product Title</label>
                <input class="form-control" name="name" id="title" type="text" class="@error('name') is-invalid @enderror">
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                </div>
                <div class="form-group">
                <label for="sku">Product Sku</label>
                <input class="form-control" name="sku" id="sku" type="text" class="@error('sku') is-invalid @enderror">
                @error('sku')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                </div>
                <div class="form-group">
                <label for="price">Product Price</label>
                <input class="form-control" name="price" id="price" type="text" class="@error('price') is-invalid @enderror">
                @error('price')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                </div>
                <div class="form-group">
                    <label for="leg_type">Leg Type Multiple Select</label>
                    <select name="leg_type[]" multiple class="form-control" id="leg_type">
                        @foreach($legs as $leg)
                            <option value="{{ $leg->id }}">{{ $leg->leg_name }}</option>
                        @endforeach
                    </select>
                    @error('leg_type')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Add Product</button>
                <a href="/public" class="btn btn-primary">Go Back</a>
            </form>
        </div>
    </div>
</div>
@endsection
