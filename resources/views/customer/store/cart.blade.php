<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form action="{{ route('checkout') }}" method="POST" class="mt-4">
        @csrf
        <button class="bg-green-600 text-white px-4 py-2 rounded">Place Order</button>
    </form>
    
    <h2 class="text-xl font-bold">Your Cart</h2>
    @forelse($cart as $id => $item)
        <div class="flex justify-between items-center border-b py-2">
            <div>
                <strong>{{ $item['name'] }}</strong><br>
                Qty: {{ $item['qty'] }} x ${{ $item['price'] }}
            </div>
            <form action="{{ route('cart.remove', $id) }}" method="POST">
                @csrf @method('DELETE')
                <button class="text-red-500">Remove</button>
            </form>
        </div>
    @empty
        <p>No items in cart.</p>
    @endforelse

</body>

</html>
