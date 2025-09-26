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
                        <h3 class="card-title">Create Section - Who We Are</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('whoWeAreStore') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="title">Section Title</label>
                                        <input type="text" name="title" class="form-control" id="title"
                                            placeholder="Enter Your Title" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea name="description" class="form-control" id="description" cols="5" rows="3"
                                            placeholder="Write section description.."></textarea>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="feature_image_right">Top Feature Image</label>
                                        <input type="file" name="feature_image_right" class="form-control"
                                            id="feature_image_right" placeholder="Upload an Image" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="feature_image_one">Bottom Feature Image 1</label>
                                        <input type="file" name="feature_image_one" class="form-control"
                                            id="feature_image_one" placeholder="Upload feature image" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="feature_image_two">Bottom Feature Image 2</label>
                                        <input type="file" name="feature_image_two" class="form-control"
                                            id="feature_image_two" placeholder="Upload Feature Image" required>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="feature_one_title">Feature One Title</label>
                                        <input type="text" name="feature_one_title" class="form-control"
                                            id="feature_one_title" placeholder="Write short title" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="feature_one_desc">Feature One Subtitle</label>
                                        <input type="text" name="feature_one_desc" class="form-control"
                                            id="feature_one_desc" placeholder="Write short subtitle" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="feature_two_title">Feature Two Title</label>
                                        <input type="text" name="feature_two_title" class="form-control"
                                            id="feature_two_title" placeholder="Write short title" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="feature_two_desc">Feature Two Subtitle</label>
                                        <input type="text" name="feature_two_desc" class="form-control"
                                            id="feature_two_desc" placeholder="Write short subtitle" required>
                                    </div>
                                </div>

                            </div>

                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary">Create Section</button>
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
