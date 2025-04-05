@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-6">
            <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid rounded shadow-sm" alt="{{ $product->name }}">
        </div>
        <div class="col-md-6">
            <h2>{{ $product->name }}</h2>
            <p class="text-muted">${{ number_format($product->price, 2) }}</p>
            <p>Stock: {{ $product->stock }}</p>
            <form action="{{ route('cart.add', $product) }}" method="POST" class="mt-4">
                @csrf
                <button type="submit" class="btn btn-success btn-lg">
                    <i class="bi bi-cart-plus"></i> Add to Cart
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
