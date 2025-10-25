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





                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Section - Team</h3>
                        <span style="display: flex;justify-content: end" class="create_btn success"><a
                                href="{{ route('teamCreate') }}" class="btn btn-sm btn-success">Create Team
                                Member</a></span>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Designation</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (@$team->count() > 0)
                                    @foreach ($team as $member)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>

                                            <td>
                                                @if (isset($member->image))
                                                    <img src="/upload/team/{{ $member->image }}" alt="image"
                                                        width="50">
                                                @else
                                                    <img src="/upload/default.png" alt="image" width="40">
                                                @endif

                                            </td>
                                            <td><span>{{ $member->name, 10 }}</span>
                                            </td>
                                            <td>
                                                <span>{{ $member->designation, 10 }}</span>
                                            </td>
                                            <td>
                                                <a href="{{ route('teamEdit', $member->id) }}" title="Edit"
                                                    class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                                <a href="{{ route('teamDestroy', $member->id) }}" title="Delete"
                                                    id="deleteEvent" class="btn btn-sm btn-danger"><i
                                                        class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                @endif
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
