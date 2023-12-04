<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Invoice PDF</title>
</head>
<body>
  <H1>Invoice</H1>
  <h3>Order Details</h3>
<table border="1">
    <thead>
        <tr>
            <th>User Name</th>
            <th>User Email</th>
            <th>Product Name</th>
            <th>Product Price</th>
            <th>Quantity</th>
        </tr>
    </thead>
    <tbody>
        @foreach($orderDetails as $orderDetail)
            <tr>
                <td>{{ $orderDetail->order->user->name }}</td>
                <td>{{ $orderDetail->order->user->email }}</td>
                <td>{{ $orderDetail->product->name }}</td>
                <td>{{ $orderDetail->product->price }}</td>
                <td>{{ $orderDetail->quantity }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
</body>
</html>