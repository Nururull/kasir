<!-- resources/views/orders/pdf.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Order PDF</title>
    <style>
        /* Atur gaya CSS untuk PDF sesuai kebutuhan */
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table th,
        table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        table th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h1 class="mb-4">Pesanan</h1>
    <hr>
    <div class="card mb-4">
        <div class="card-header">
            Order #{{ $order->id }} - {{ $order->created_at }}
        </div>
        <hr>
        <div class="card-body">
            <h5 class="card-title">Order Information</h5>
            <p class="card-text">Nama Lengkap: {{ $order->user->name }}</p>
            <p class="card-text">Total Harga: Rp. {{ number_format($order->total_price, 2) }}</p>
            <hr>
            <h5 class="mt-4">Ordered Products</h5>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order->product as $item)
                        <tr>
                            <td>{{ $item->product->name }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>Rp. {{ number_format($item->price, 2) }}</td>
                            <td>Rp. {{ number_format($item->price * $item->quantity, 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
