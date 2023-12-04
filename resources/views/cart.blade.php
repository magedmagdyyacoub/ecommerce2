<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>Electro - HTML Ecommerce Template</title>

		<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href="home/css/bootstrap.min.css"/>

		<!-- Slick -->
		<link type="text/css" rel="stylesheet" href="home/css/slick.css"/>
		<link type="text/css" rel="stylesheet" href="home/css/slick-theme.css"/>

		<!-- nouislider -->
		<link type="text/css" rel="stylesheet" href="home/css/nouislider.min.css"/>

		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="home/css/font-awesome.min.css">

		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href="home/css/style.css"/>

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  
    

    </head>
	<body>
		<!-- HEADER -->
		<header>
			<!-- TOP HEADER -->
			<div id="top-header">
				@include('home.header')
        <br>
        <div class="container">
          <table id="cart" class="table table-hover table-condensed">
              <thead>
                  <tr>
                      <th style="width:50%">Product</th>
                      <th style="width:10%">Price</th>
                      <th style="width:8%">Quantity</th>
                      <th style="width:22%" class="text-center">Subtotal</th>
                      <th style="width:10%"></th>
                  </tr>
              </thead>
              <tbody>
                  @php $total = 0 @endphp
                  @if(session('cart'))
                      @foreach(session('cart') as $id => $details)
                          @php $total += $details['price'] * $details['quantity'] @endphp
                          <tr data-id="{{ $id }}">
                              <td data-th="Product">
                                  <div class="row">
                                      <div class="col-sm-3 hidden-xs"><img src="/image/{{ $details['image'] }}" width="100" height="100" class="img-responsive"/></div>
                                      <div class="col-sm-9">
                                          <h4 class="nomargin">{{ $details['name'] }}</h4>
                                      </div>
                                  </div>
                              </td>
                              <td data-th="Price">${{ $details['price'] }}</td>
                              <td data-th="Quantity">
                                  <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity update-cart" />
                              </td>
                              <td data-th="Subtotal" class="text-center">${{ $details['price'] * $details['quantity'] }}</td>
                              <td class="actions" data-th="">
                                  <button class="btn btn-danger btn-sm remove-from-cart"><i class="fa fa-trash-o"></i></button>
                              </td>
                          </tr>
                      @endforeach
                  @endif
              </tbody>
              <tfoot>
                  <tr>
                      <td colspan="5" class="text-right"><h3><strong>Total ${{ $total }}</strong></h3></td>
                  </tr>
                  <tr>
                      <td colspan="5" class="text-right">
                          <a href="{{ url('/') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a>
                          <button class="btn btn-success"><a href="{{ url('/checkout')}}">checkout</a></button>
                      </td>
                  </tr>
              </tfoot>
          </table>
        </div>
      </div>


<script type="text/javascript">
  
    $(".update-cart").change(function (e) {
        e.preventDefault();
  
        var ele = $(this);
  
        $.ajax({
            url: '{{ route('update.cart') }}',
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}', 
                id: ele.parents("tr").attr("data-id"), 
                quantity: ele.parents("tr").find(".quantity").val()
            },
            success: function (response) {
               window.location.reload();
            }
        });
    });
  
    $(".remove-from-cart").click(function (e) {
      //console.log(10);
        e.preventDefault();
  
        var ele = $(this);
  
        if(confirm("Are you sure want to remove?")) {
            $.ajax({
                url: '{{ route('remove.from.cart') }}',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}', 
                    id: ele.parents("tr").attr("data-id")
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    });
  
</script>
</body>
</html>