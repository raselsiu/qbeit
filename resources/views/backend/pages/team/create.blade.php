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




                @if (@$banners->count() > 0)
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Footer & Header Info</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Image</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Address</th>
                                        <th style="width: 40px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($banners as $banner)
                                        <tr>
                                            <td>1.</td>
                                            <td>
                                                <img src="/upload/banner/{{ $banner->image }}" alt="image"
                                                    width="50">
                                            </td>
                                            <td><span class="badge bg-success">{{ Str::limit($banner->title, 10) }}</span>
                                            </td>
                                            <td><span
                                                    class="badge bg-success">{{ Str::limit($banner->subtitle, 10) }}</span>
                                            </td>
                                            <td>
                                                <a href="{{ route('bannerEdit', $banner->id) }}" title="Edit"
                                                    class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                                <a href="{{ route('bannerDestroy', $banner->id) }}" title="Delete"
                                                    id="deleteEvent" class="btn btn-sm btn-danger"><i
                                                        class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @else
                @endif


                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Create Banner </h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('bannerStore') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" name="title" class="form-control" id="title"
                                            placeholder="Enter Your Title" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="subtitle">Subtitle</label>
                                        <input type="text" class="form-control" name="subtitle" id="subtitle"
                                            placeholder="Enter Your Subtitle" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Icon Class">Banner Logo</label>
                                        <input type="file" name="image" class="form-control" id="image"
                                            placeholder="Upload Icon" required>
                                    </div>
                                </div>
                            </div>



                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary">Create Banner</button>
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
@endpush
