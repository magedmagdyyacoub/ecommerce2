<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
    }

    .navbar {
      background-color: #007bff;
    }

    .navbar-brand {
      color: #fff;
      font-size: 24px;
      font-weight: bold;
    }

    .table {
      background-color: #fff;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    th, td {
      text-align: center;
    }

    th {
      background-color: #007bff;
      color: #fff;
    }

    tbody tr:nth-child(even) {
      background-color: #f2f2f2;
    }

    tbody tr:hover {
      background-color: #cce5ff;
    }
  </style>
  <title>All Orders</title>
</head>
<div nav class="navbar navbar-expand-lg navbar-light">
  <a class="navbar-brand" href="#">All Orders</a>
</div>

<div class="container mt-3">
  <table class="table">
    <thead>
      <tr>
        <th scope="col">User ID</th>
        <th scope="col">Order Date</th>
        <th scope="col">Status</th>
        <th scope="col">Delivered</th>
        <th scope="col">PDF</th> 
      </tr>
    </thead>
    <tbody>
      @foreach($orders as $order)
      <tr>
        <td>{{ $order->user_id }}</td>
        <td>{{ date('d F Y', strtotime($order->created_at)) }}</td>
        <td><span class="badge badge-pill badge-primary">{{ $order->status }}</span></td>
        
        <td>
          @if($order->status=='In Progress')

          <a href="{{ url('delivered',$order->id)}}" class="btn btn-primary">Delivered</a>
          @elseif($order->status == 'delivered')
        <p style="color:orange ">Delivered</p>
        @endif
        </td>
        <td>
          <a href="{{url('generate-pdf',$order->id)}}" class="btn btn-danger">Print PDF</a>
      </tr>
      @endforeach
    </tbody>
  </table>

  <!-- Pagination links -->
  {{ $orders->links() }}
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>