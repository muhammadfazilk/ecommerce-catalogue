<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Store</h2>
    </x-slot>

    <div class="row">
        <div class="col-md-3">
            <form method="GET" action="{{ route('store.index') }}">
                <select name="category" class="form-select" onchange="this.form.submit()">
                    <option value="">All Categories</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" {{ request('category') == $cat->id ? 'selected' : '' }}>
                            {{ $cat->name }}
                        </option>
                    @endforeach
                </select>
            </form>
        </div>

        <div class="col-md-9">
            <div class="row">
                @foreach ($products as $product)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" height="200">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <p>${{ $product->price }}</p>
                                <a href="{{ route('store.products.show', $product) }}" class="btn btn-sm btn-outline-primary">View</a>
                                <form action="{{ route('cart.add', $product) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button class="btn btn-sm btn-success">Add to Cart</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{ $products->links() }}
        </div>
    </div>
</x-app-layout>
