
<div>
    <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Product Delete</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="destroyProduct"> 

                <div class="modal-body">
                    <h6>Are you sure you want to delete this data?</h6>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Yes. Delete</button>
                </div>

            </form>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h4>Products
                        <a href="{{ url('admin/products/create') }}" class="btn btn-primary btn-sm float-end">Add Product</a>
                    </h4>
                </div>
                <div class="card-body">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->product_name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>
                        @if ($product->image)
                            <img src="{{ asset('uploads/products/' . $product->image) }}" alt="Product Image" width="50" height="50">
                        @else
                            No Image
                        @endif
                    </td>
                    <td>
                        <a href="{{ url('admin/products/'.$product->id.'/edit') }}" class="btn btn-success">Edit</a>
                        <a href="#" wire:click="deleteProduct({{$product->id}})" data-bs-toggle="modal" data-bs-target="#deleteModal" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div>
        {{ $products->links() }}
    </div>
</div>

@push('script')
<script>
    window.addEventListener('close-modal', event => {
        $('#deleteModal').modal('hide');
    });
</script>
@endpush