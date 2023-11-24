@if(Session::has('email'))
  $user = Session::get('email')
@else
<script>window.location.href = 'admin/login'</script>
@endif
@if(Session::has('update'))
  <script type="text/javascript">

  function massge() {
  Swal.fire(
            'Good job!',
            'Successfully Saved!',
            'success'
        );
  }

  window.onload = massge;
 </script>
@endif
@if(Session::has('logout'))
  Session::flush();
  <script>window.location.href = 'admin/login'</script>
@endif

{{$user = Session::get('email')}}
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Product</title>
    @include ("adm-css-link")
  </head>
  <body>
    <div class="container-scroller">
      
      <!-- partial:partials/_navbar.html -->
      @include ("adm-navbar")
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
       @include("adm-sidebar")
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header title-product">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-package-variant-closed"></i>
                </span> Product
              </h3>
            </div>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal ">
              Add Product 
            </button>

            <!-- Modal Add Product -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <form action="/admin" method="post" enctype="multipart/form-data">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      
                        @csrf
                        
                        <label for="product_name" class="form-label">Product Name :</label>
                        <input type="text" class="form-control" name="product_name" id="product_name" value="{{ old('product_name') }}">
                        @error('product_name')
                            <div>{{ $message }}</div>
                        @enderror

                        <label for="description" class="form-label"> Description :</label>
                        <input type="text" class="form-control" name="description" id="description" value="{{ old('description') }}">
                        @error('description')
                            <div>{{ $message }}</div>
                        @enderror

                        <label for="price" class="form-label" >Price</label>
                        <input type="number" class="form-control" step="1" name="price" id="price" value="{{ old('price') }}">
                        @error('price')
                            <div>{{ $message }}</div>
                        @enderror

                        <label for="quantity" class="form-label" >Quantity</label>
                        <input type="number" class="form-control" step="1" name="quantity" id="quantity" value="{{ old('quantity') }}">
                        @error('quantity')
                            <div>{{ $message }}</div>
                        @enderror

                        <label for="image" class="form-label" >Image</label>
                        <input type="file" class="form-control" name="image" id="image">
                        @error('image')
                            <div>{{ $message }}</div>
                        @enderror
                      
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary" name="action" value="add">Add Product</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Product List</h4>
                    </p>
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th> Id </th>
                          <th> Product Name </th>
                          <th> Description </th>
                          <th> Price </th>
                          <th> Quantity </th>
                          <th> Image </th>
                          <th> Action </th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($products as $product)
                          <tr>
                            <td> {{$product->id}} </td>
                            <td> {{$product->product_name}} </td>
                            <td> {{$product->description}} </td>
                            <td> {{$product->price}} </td>
                            <td> {{$product->quantity}} </td>
                            <td> <img src="{{$product->image}}" width="30"> </td>
                            <td> 
                              <a href="#" data-bs-toggle="modal" data-bs-target="#edit{{$product->id}}"><i class="mdi mdi-square-edit-outline" ></i></a>
                              <a href="#" data-bs-toggle="modal" data-bs-target="#delete{{$product->id}}"><i class="mdi mdi-cancel"></i></a>
                            </td>
                          </tr>
                          <!-- Modal Edit Product -->
                          <div class="modal fade" id="edit{{$product->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <form action="/admin" method="post" enctype="multipart/form-data">
                                  <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Update</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                    
                                      @csrf

                                      <label for="id" class="form-label">Product ID :</label>
                                      <input type="text" class="form-control" name="edit_id" id="id" value="{{$product->id}}" readonly>
                                      @error('edit_id')
                                          <div>{{ $message }}</div>
                                      @enderror
                                      
                                      <label for="product_name" class="form-label">Product Name :</label>
                                      <input type="text" class="form-control" name="edit_product_name" id="product_name" value="{{$product->product_name}}">
                                      @error('edit_product_name')
                                          <div>{{ $message }}</div>
                                      @enderror

                                      <label for="description" class="form-label"> Description :</label>
                                      <input type="text" class="form-control" name="edit_description" id="description" value="{{$product->description}}">
                                      @error('edit_description')
                                          <div>{{ $message }}</div>
                                      @enderror

                                      <label for="price" class="form-label" >Price</label>
                                      <input type="number" class="form-control" step="1"  name="edit_price" id="price" value="{{$product->price}}">
                                      @error('edit_price')
                                          <div>{{ $message }}</div>
                                      @enderror

                                      <label for="quantity" class="form-label" >Quantity</label>
                                      <input type="number" class="form-control" step="1" name="edit_quantity" id="quantity" value="{{$product->quantity}}">
                                      @error('edit_quantity')
                                          <div>{{ $message }}</div>
                                      @enderror

                                      <label for="image" class="form-label" >Image</label>
                                      <input type="file" class="form-control mb-2" name="edit_image" id="image">
                                      <img src="{{$product->image}}" width="150">
                                      @error('edit_image')
                                          <div>{{ $message }}</div>
                                      @enderror

                                    
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary" name="action" value="update">Update</button>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                          <!-- Modal Delete Product -->
                          <div class="modal fade" id="delete{{$product->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <form action="/admin" method="post" enctype="multipart/form-data">
                                  <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Delete</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                    
                                      @csrf

                                      <label for="id" class="form-label">Are you sure?</label>
                                      <input type="hidden" class="form-control" name="edit_id" id="id" value="{{$product->id}}" readonly>
                                      

                                    
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary" name="action" value="delete">Delete</button>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="container-fluid d-flex justify-content-between">
              <span class="text-muted d-block text-center text-sm-start d-sm-inline-block">Copyright © bootstrapdash.com 2021</span>
              <span class="float-none float-sm-end mt-1 mt-sm-0 text-end"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin template</a> from Bootstrapdash.com</span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets/vendors/chart.js/Chart.min.js"></script>
    <script src="assets/js/jquery.cookie.js" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/todolist.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    

    <!-- End custom js for this page -->
  </body>
</html>