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
                        <h3 class="card-title">Create Section - Why Choose Us</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('whyChooseUsStore') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="title">Section Title</label>
                                        <input type="text" name="title" class="form-control" id="title"
                                            placeholder="Write section Title" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea name="desc" class="form-control" id="editor1" cols="5" rows="3"
                                            placeholder="Write section description.." required></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <hr>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="feature_image_right">Feature One Title</label>
                                        <input type="text" name="feature_1_title" class="form-control"
                                            id="feature_image_right" placeholder="Write Feature One Title" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="feature_image_one">Feature One Description</label>
                                        <input type="text" name="feature_1_desc" class="form-control"
                                            id="feature_image_one" placeholder="Enter short description" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="feature_image_two">Feature One Image</label>
                                        <input type="file" name="feature_1_img" class="form-control" id="feature_1_img"
                                            placeholder="Upload Feature Image" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <hr>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="feature_2_title">Feature 2 Title</label>
                                        <input type="text" name="feature_2_title" class="form-control"
                                            id="feature_2_title" placeholder="Enter Feature Title" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="feature_2_desc">Feature 2 Description</label>
                                        <input type="text" name="feature_2_desc" class="form-control" id="feature_2_desc"
                                            placeholder="Enter short Description" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="feature_2_img">Feature 2 Image</label>
                                        <input type="file" name="feature_2_img" class="form-control" id="feature_2_img"
                                            placeholder="Upload Feature Image" required>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <hr>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="feature_3_title">Feature 3 Title</label>
                                        <input type="text" name="feature_3_title" class="form-control"
                                            id="feature_3_title" placeholder="Enter Feature Title" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="feature_3_desc">Feature 3 Description</label>
                                        <input type="text" name="feature_3_desc" class="form-control"
                                            id="feature_3_desc" placeholder="Enter short Description" required>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="feature_3_img">Feature 3 Image</label>
                                        <input type="file" name="feature_3_img" class="form-control"
                                            id="feature_3_img" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <hr>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="feature_one_desc">Section Image One</label>
                                        <input type="file" name="section_img_1" class="form-control"
                                            id="section_img_1" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="feature_one_desc">Section Image Two</label>
                                        <input type="file" name="section_img_2" class="form-control"
                                            id="section_img_2" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="feature_two_title">Section Image Three</label>
                                        <input type="file" name="section_img_3" class="form-control"
                                            id="section_img_3" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="feature_two_desc">Section Image Four</label>
                                        <input type="file" name="section_img_4" class="form-control"
                                            id="section_img_4" required>
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

    <script>
        CKEDITOR.replace('desc');
    </script>
@endpush
