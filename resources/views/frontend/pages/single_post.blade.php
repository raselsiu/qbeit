@extends('frontend.layouts.frontend_master')

@section('content')
    <section class="th-blog-wrapper blog-details space-top space-extra-bottom">
        <div class="container">
            <div class="row">
                <div class="col-xxl-8 col-lg-7">
                    <div class="th-blog blog-single">
                        <div class="blog-img"><img src="{{ asset('upload/posts/' . $post->image) }}" alt="Blog Image"></div>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <a class="author" href="javascript:void(0)"><i class="fa-light fa-user"></i>QbeIT</a>

                                <a class="author" href="javascript:void(0)"><i
                                        class="fa-light fa-list"></i>{{ $post->category }}</a>

                                <a href="javascript:void(0)"><i
                                        class="fa-regular fa-calendar"></i>{{ $post->created_at->format('d M, Y') }}</a>
                            </div>
                            <h2 class="blog-title">{{ $post->title }}</h2>
                            <p class="blog-text mb-30">{!! $post->desc !!}</p>
                            <div class="share-links clearfix">
                                <div class="row justify-content-between">
                                    <div class="col-md-auto"><span class="share-links-title">Category:</span>
                                        <div class="tagcloud"><a href="blog.html">{{ $post->category }}</a></div>
                                    </div>
                                    <div class="col-md-auto text-xl-end">
                                        <div class="share-links_wrapp"><span class="share-links-title">Share:</span>
                                            <div class="social-links"><a href="https://www.facebook.com/"><i
                                                        class="fab fa-facebook-f"></i></a> <a
                                                    href="https://www.twitter.com/"><i class="fab fa-twitter"></i></a> <a
                                                    href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
                                                <a href="https://www.linkedin.com/"><i class="fab fa-linkedin-in"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-lg-5">
                    <aside class="sidebar-area">
                        <div class="widget widget_search">
                            <form class="search-form"><input type="text" placeholder="Search"> <button type="submit"><i
                                        class="far fa-search"></i></button></form>
                        </div>
                        <div class="widget widget_categories">
                            <h3 class="widget_title">Categories</h3>
                            <ul>
                                @foreach ($categories as $category)
                                    <li>
                                        <a
                                            href="{{ route('findPostByCategory', $category->name) }}">{{ $category->name }}</a>
                                        <span>
                                            <i class="fa-regular fa-arrow-up-right"></i>
                                        </span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="widget">
                            <h3 class="widget_title">Recent Posts</h3>
                            <div class="recent-post-wrap">
                                @foreach ($latest as $post)
                                    <div class="recent-post">
                                        <div class="media-img"><a href="{{ route('singlePost', $post->slug) }}"><img
                                                    src="{{ asset('upload/posts/' . $post->image) }}" alt="Blog Image"></a>
                                        </div>
                                        <div class="media-body">
                                            <div class="recent-post-meta"><a
                                                    href="{{ route('singlePost', $post->slug) }}"><i
                                                        class="fa-solid fa-calendar-days"></i>{{ $post->created_at->format('d M, Y') }}</a>
                                            </div>
                                            <h5 class="post-title"><a class="text-inherit"
                                                    href="{{ route('singlePost', $post->slug) }}">{{ $post->title }}</a>
                                            </h5>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                        <div class="widget widget_banner background-image"
                            style="background-image: url(&quot;assets/img/bg/widget_banner.jpg&quot;);">
                            <div class="widget-banner position-relative text-center"><span class="icon"><i
                                        class="fa-solid fa-phone"></i></span> <span class="text">Need Help? Send a
                                    Message</span> <a class="phone" href="mailto:qbeit@gmail.com">qbeit@gmail.com</a> <a
                                    href="mailto:qbeit@gmail.com" class="th-btn style6">Get A Quote <i
                                        class="fa-light fa-arrow-right-long"></i></a></div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>
@endsection
