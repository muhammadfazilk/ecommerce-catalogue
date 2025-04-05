@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="mb-4 text-center">Explore Products</h2>

    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach($products as $product)
            <div class="col">
                <div class="card h-100 shadow-sm">
                    <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text text-muted">${{ number_format($product->price, 2) }}</p>
                        <p class="small text-secondary">Stock: {{ $product->stock }}</p>
                        <a href="{{ route('store.show', $product) }}" class="btn btn-primary mt-auto">
                            View Product
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
