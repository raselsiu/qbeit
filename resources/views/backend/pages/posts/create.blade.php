@extends('backend.layout.master_layout')

@section('content')
    <br><br>



    <div class="container">
        <div class="row">
            <div class="col-md-12">

                @if (session()->has('msg'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('msg') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif


                @if (session()->has('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif



                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Create - Posts</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('postsStore') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="title">Post Title</label>
                                        <input type="text" name="title" class="form-control" id="title"
                                            placeholder="Enter Your Title" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="description"> Post Description</label>
                                        <textarea name="desc" id="desc" cols="10" rows="20" class="form-control"
                                            placeholder="Enter Your Description" required></textarea>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Image">Image</label>
                                        <input type="file" name="image" class="form-control" id="image"
                                            placeholder="Upload Image" required>
                                    </div>
                                </div>
                            </div>



                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary">Create Posts Section</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection


@push('js')
    <script>
        $(function() {
            $(document).on('click', '#deleteEvent', function(e) {
                e.preventDefault();
                var link = $(this).attr('href');
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = link;
                        Swal.fire({
                            title: "Deleted!",
                            text: "Your file has been deleted.",
                            icon: "success"
                        });
                    }
                });
            })
        })
    </script>

    <script>
        CKEDITOR.replace('desc');
    </script>
@endpush
