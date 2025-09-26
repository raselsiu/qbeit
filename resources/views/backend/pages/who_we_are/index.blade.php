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
                <div class="card">
                    <div class="card-header header_ctrl">
                        <h3 class="card-title">Section - Who We Are</h3>
                        <span style="display: flex;justify-content: end" class="create_btn"><a
                                href="{{ route('whoWeAreCreate') }}">Create</a></span>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>S. Title</th>
                                    <th>Desc</th>
                                    <th>Feature Top Image</th>
                                    <th style="width: 150px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($whoweare as $qbeit)
                                    <tr>
                                        <td>1.</td>
                                        <td><span class="badge bg-success">{{ Str::limit($qbeit->title, 20) }}</span>
                                        </td>
                                        <td><span class="badge bg-success">{{ Str::limit($qbeit->description, 20) }}</span>
                                        </td>
                                        <td>
                                            <img src="/upload/who_we_are/{{ $qbeit->feature_image_right }}" alt="image"
                                                width="50">
                                        </td>
                                        <td>
                                            <a href="{{ route('whoWeAreEdit', $qbeit->id) }}" title="Edit"
                                                class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                            <a href="{{ route('whoWeAreDestroy', $qbeit->id) }}" title="Delete"
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
