@extends('frontend.layouts.frontend_master')

@section('content')
    <section class="blog-area space space-extra2-bottom">
        <div class="container">
            <div class="blog-area">
                <div class="row gy-30 justify-content-center">

                    @if ($posts->count() < 1)
                        <div class="col-md-12">
                            <h3 class="text-center">No Posts Found</h3>
                        </div>
                    @endif

                    @foreach ($posts as $post)
                        <div class="col-xl-4 col-md-6">
                            <div class="blog-box th-ani">
                                <div class="blog-img global-img"><img src="{{ asset('upload/posts/' . $post->image) }}"
                                        alt="blog image"></div>
                                <div class="blog-box_content">
                                    <div class="blog-meta">
                                        <a class="author" href="javascript:void(0)"><i
                                                class="fa-light fa-user"></i>QbeIT</a>
                                        <a class="author" href="{{ route('singlePost', $post->slug) }}">
                                            <i
                                                class="fa-regular fa-calendar"></i>{{ $post->created_at->format('F d, Y') }}</a>

                                    </div>
                                    <h3 class="box-title"><a
                                            href="{{ route('singlePost', $post->slug) }}">{{ $post->title }}</a></h3><a
                                        href="{{ route('singlePost', $post->slug) }}"
                                        class="th-btn style4 th-icon mb-10">Read
                                        More </a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>
@endsection
