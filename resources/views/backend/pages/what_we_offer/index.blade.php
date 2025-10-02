@extends('backend.layout.master_layout')

@section('content')
    <br><br>



    <div class="container">
        <div class="row">
            <div class="col-md-12">


                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Section - What We Offer</h3>
                        <span style="display: flex;justify-content: end" class="create_btn success"><a
                                href="{{ route('whatWeOfferCreate') }}" class="btn btn-sm btn-success">Create</a></span>
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
                                @if (@$whoweare->count() > 0)
                                    @foreach ($whoweare as $who)
                                        <tr>
                                            <td>1.</td>
                                            <td>
                                                <img src="/upload/what_we_offer/{{ $who->image }}" alt="image"
                                                    width="50">
                                            </td>
                                            <td><span class="badge bg-success">{{ Str::limit($who->title, 10) }}</span>
                                            </td>
                                            <td><span
                                                    class="badge bg-success">{{ Str::limit($who->description, 10) }}</span>
                                            </td>
                                            <td>
                                                <a href="{{ route('whatWeOfferEdit', $who->id) }}" title="Edit"
                                                    class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                                <a href="{{ route('whatWeOfferDestroy', $who->id) }}" title="Delete"
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
