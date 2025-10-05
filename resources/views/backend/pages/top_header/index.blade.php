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




                @if (@$fh->id)
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Footer & Header Info</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Logo</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Address</th>
                                        <th style="width: 120px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1.</td>
                                        <td>
                                            <img src="/upload/header_footer/{{ $fh->logo }}" alt="image"
                                                width="50">
                                        </td>
                                        <td><span>{{ $fh->email }}</span></td>
                                        <td><span>{{ $fh->phone }}</span></td>
                                        <td><span>{{ Str::limit($fh->address, 20) }}</span></td>
                                        <td>
                                            <a href="{{ route('topHeaderEdit', $fh->id) }}" title="Edit"
                                                class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                            <a href="{{ route('topHeaderDestroy', $fh->id) }}" title="Delete"
                                                id="deleteEvent" class="btn btn-sm btn-danger"><i
                                                    class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                @else
                @endif







                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Site Settings</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('topHeaderStore') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">E-mail</label>
                                        <input type="email" name="email" class="form-control" id="email"
                                            placeholder="Enter Your Email Address" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input type="text" class="form-control" name="phone" id="phone"
                                            placeholder="Enter Your Phone Number">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="logo">Site Logo</label>
                                        <input type="file" name="logo" class="form-control" id="logo"
                                            placeholder="Enter Your Address" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <hr>
                                        <label for="social">Social Entry</label>
                                        <hr>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fb">Facebook</label>
                                        <input type="text" class="form-control" id="fb" name="fb"
                                            placeholder="Enter facebook link">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="ln">Linkedin</label>
                                        <input type="text" class="form-control" id="ln" name="ln"
                                            placeholder="Enter Linkedin Profile Link">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="wh">Whatsapp</label>
                                        <input type="text" class="form-control" id="whatsapp" name="wh"
                                            placeholder="Enter WhatsApp Url">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <textarea name="address" class="form-control" id="address" cols="2" rows="2" required></textarea>
                                    </div>
                                </div>
                            </div>



                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
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
