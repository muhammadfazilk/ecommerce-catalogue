<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h2 class="text-2xl font-bold mb-4">All Orders</h2>

    @foreach ($orders as $order)
        <div class="border rounded p-4 mb-4">
            <p><strong>Order #{{ $order->id }}</strong> — Status:
                <span class="capitalize text-{{ $order->status == 'completed' ? 'green' : 'yellow' }}-600">
                    {{ $order->status }}
                </span>
            </p>
            <p>Customer: {{ $order->user->name }} ({{ $order->user->email }})</p>
            <ul class="ml-4">
                @foreach ($order->items as $item)
                    <li>{{ $item->product->name }} — Qty: {{ $item->quantity }} — ${{ $item->price }}</li>
                @endforeach
            </ul>
            <p class="mt-2 font-semibold">Total: ${{ $order->total }}</p>
        </div>
    @endforeach

</body>

</html>
