@extends('categories.layout')
  
@section('content')

<div class="container">
  <div class="row">
      <div class="col-lg-12 margin-tb">
          <div class="pull-left">
              <h2>Add New Product</h2>
          </div>
          <div class="pull-right">
              <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
          </div>
      </div>
  </div>
      
  @if ($errors->any())
      <div class="alert alert-danger">
          <strong>Whoops!</strong> There were some problems with your input.<br><br>
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif
      
  <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
      
      <div class="row">
          <div class="col-xs-6 col-sm-6 col-md-6">
              <div class="form-group">
                  <strong>Name:</strong>
                  <input type="text" name="name" class="form-control" placeholder="Name">
              </div>
          </div>
          <div class="col-xs-6 col-sm-6 col-md-6">
              <div class="form-group">
                  <strong>Detail:</strong>
                  <textarea class="form-control" style="height:40px" name="detail" placeholder="Detail"></textarea>
              </div>
          </div>
          <div class="col-xs-6 col-sm-6 col-md-6">
              <div class="form-group">
                  <strong>Image:</strong>
                  <input type="file" name="image" class="form-control" placeholder="image">
              </div>
          </div>
          <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Price:</strong>
                <input type="number" name="price" class="form-control" placeholder="price">
            </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6">
          <div class="form-group">
              <strong>discount Price:</strong>
              <input type="number" name="discount_price" class="form-control" placeholder="discount price">
          </div>
      </div>
      <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <strong>discount Price:</strong>
            <input type="number" name="quantity" class="form-control" placeholder="quantity">
        </div>
    </div>
          <div class="col-xs-6 col-sm-6 col-md-6">
            <label><strong>Select Category :</strong></label><br/>
            <select class="" name="cat[]" multiple="">
              <option value="laptop">laptop</option>
              <option value="computer">computer</option>
              <option value="Mobile">Mobile</option>
              <option value="phone">phone</option>
              <option value="angular">Angular</option>
              <option value="vue">Vue</option>
            </select>
        </div>
          <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                  <button type="submit" class="btn btn-primary">Add Product</button>
          </div>
      </div>
      
  </form>
</div>
@endsection