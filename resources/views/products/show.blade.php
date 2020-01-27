@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->name }}</h5>
                        <p class="card-text">SKU# {{ $item->sku }}</p>
                        <p class="card-text">Price: ${{ $item->price }}</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <label for="leg_type">Select Leg Type</label>
                            <select class="form-control">
                                @foreach ($item->legs as $leg)
                                    <option value="{{ $leg->id }}">{{ $leg->leg_name }}</option>
                                @endforeach
                            </select>
                            <br><br>
                        </li>
                    </ul>
                    <div class="card-body">
                        <a href="#" class="card-link"><button type="submit" class="btn btn-primary">Add To Cart</button></a>
                        <a href="/public/products" class="card-link">Go Back</a>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
@endsection
