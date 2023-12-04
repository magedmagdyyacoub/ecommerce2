<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
@include('admin.css')
</head>
<body>
@include('admin.header')
  
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
    @include('admin.sidebar')
      <!-- partial -->
    @include('admin.body')
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
      @include('admin.footer')
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
@include('admin.script')
</body>

</html>

