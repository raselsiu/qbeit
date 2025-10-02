@extends('backend.layout.master_layout')
@push('css')
    <style>
        span.create_btn {
            border: 1px solid #ededed;
            width: 90px;
            float: right;
            padding: 2px 22px;
            border-radius: 9px;
            background: #1d900a;
        }

        span a {
            color: #fff;
        }

        span a:hover {
            color: #fff;
        }
    </style>
@endpush
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
                <div class="card">
                    <div class="card-header header_ctrl">
                        <h3 class="card-title">Section - Why Choose Us</h3>
                        <span style="display: flex;justify-content: end" class="create_btn"><a
                                href="{{ route('whyChooseUsCreate') }}">Create</a></span>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Section Title</th>
                                    <th>Description</th>
                                    <th style="width: 150px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($whyChooseUs as $why)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><span>{{ Str::limit($why->title, 20) }}</span>
                                        </td>
                                        <td><span>{!! Str::limit($why->desc, 20) !!}</span>
                                        </td>
                                        <td>
                                            <a href="{{ route('whyChooseUsEdit', $why->id) }}" title="Edit"
                                                class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                            <a href="{{ route('whyChooseUsDestroy', $why->id) }}" title="Delete"
                                                id="deleteEvent" class="btn btn-sm btn-danger"><i
                                                    class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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
