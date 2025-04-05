<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">{{ $product->name }}</h2>
    </x-slot>

    <div class="row">
        <div class="col-md-6">
            <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid">
        </div>
        <div class="col-md-6">
            <h3>${{ $product->price }}</h3>
            <p><strong>Stock:</strong> {{ $product->stock }}</p>
            <form action="{{ route('cart.add', $product) }}" method="POST">
                @csrf
                <button class="btn btn-primary">Add to Cart</button>
            </form>
        </div>
    </div>
</x-app-layout>
