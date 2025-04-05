<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">Shopping Cart</h2>
    </x-slot>

    <div class="container py-4">
        @if (count($products))
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered table-striped align-middle">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">Image</th>
                                <th scope="col">Product</th>
                                <th scope="col" class="text-center">Qty</th>
                                <th scope="col" class="text-end">Price</th>
                                <th scope="col" class="text-end">Subtotal</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td style="width: 80px;">
                                        @if ($product->image)
                                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="img-fluid rounded" style="max-height: 60px;">
                                        @else
                                            <span class="text-muted">No Image</span>
                                        @endif
                                    </td>
                                    <td>{{ $product->name }}</td>
                                    <td class="text-center">{{ $cart[$product->id]['qty'] }}</td>
                                    <td class="text-end">${{ number_format($product->price, 2) }}</td>
                                    <td class="text-end">
                                        ${{ number_format($product->price * $cart[$product->id]['qty'], 2) }}
                                    </td>
                                    <td class="text-center">
                                        <form action="{{ route('cart.remove', $product) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button class="btn btn-sm btn-outline-danger" onclick="return confirm('Remove this item?')">
                                                Remove
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot class="table-light">
                            <tr>
                                <td colspan="4" class="text-end fw-bold">Total:</td>
                                <td class="text-end fw-bold">
                                    ${{ number_format(
                                        $products->sum(fn($p) => $p->price * $cart[$p->id]['qty']),
                                        2
                                    ) }}
                                </td>
                                <td></td>
                            </tr>
                        </tfoot>
                    </table>

                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ route('store.index') }}" class="btn btn-secondary">Continue Shopping</a>
                        <a href="#" class="btn btn-success">Proceed to Checkout</a>
                    </div>
                </div>
            </div>
        @else
            <div class="alert alert-info">
                Your cart is empty. <a href="{{ route('store.index') }}">Start shopping</a>.
            </div>
        @endif
    </div>
</x-app-layout>
