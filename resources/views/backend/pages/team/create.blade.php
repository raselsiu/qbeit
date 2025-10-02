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


                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Create Team Section</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('teamStore') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" class="form-control" id="name"
                                            placeholder="Enter Your Name" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="designation">Designation</label>
                                        <input type="text" class="form-control" name="designation" id="designation"
                                            placeholder="Enter Your Designation" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fb">Facebook Link</label>
                                        <input type="text" class="form-control" name="fb" id="fb"
                                            placeholder="Enter Your Facebook Link">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="twitter">Twitter Link</label>
                                        <input type="text" class="form-control" name="twitter" id="twitter"
                                            placeholder="Enter Your Twitter Link">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="linkd">Linkedin</label>
                                        <input type="text" class="form-control" name="linkd" id="linkd"
                                            placeholder="Enter Your Linkedin Link">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Icon Class">Banner Logo</label>
                                        <input type="file" name="image" class="form-control" id="image"
                                            placeholder="Upload Icon">
                                    </div>
                                </div>
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
