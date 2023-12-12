<div>
    <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Slider Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form wire:submit.prevent="destroySlider"> 
                    <div class="modal-body">
                        <h6>Are you sure you want to delete this slider?</h6>
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
                    <h4>Slider
                        <a href="{{ url('admin/sliders/create') }}" class="btn btn-primary btn-sm float-end">Add Slider</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sliders as $slider)
                                <tr>
                                    <td>{{ $slider->id }}</td>
                                    <td>{{ $slider->title }}</td>
                                    <td>{{ $slider->description }}</td>
                                    <td>
                                        @if ($slider->image)
                                            <img src="{{ asset('uploads/sliders/' . $slider->image) }}" alt="Slider Image" width="50" height="50">
                                        @else
                                            No Image
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ url('admin/sliders/'.$slider->id.'/edit') }}" class="btn btn-success">Edit</a>
                                        <a href="#" wire:click="deleteSlider({{ $slider->id }})" data-bs-toggle="modal" data-bs-target="#deleteModal" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div>
                        {{ $sliders->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('script')
    <script>
        window.addEventListener('close-modal', event => {
            $('#deleteModal').modal('hide');
        });
    </script>
@endpush
