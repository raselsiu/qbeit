@extends('frontend.layouts.frontend_master')

@section('content')
    <section class="space">
        <div class="container">
            <div class="row">
                <div class="col-xxl-8 col-lg-7 col-md-6">
                    <div class="page-single">
                        <div class="service-img sv-details-img"><img class="w-100"
                                src="{{ asset('upload/what_we_offer/' . $service->image) }}" alt=""></div>
                        <div class="page-content sv-content d-block">
                            <h2 class="box-title">{{ $service->title }}</h2>
                            <p class="box-text mb-30">
                                {!! $service->description !!}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-lg-5 col-md-6">
                    <aside class="sidebar-area">
                        <div class="widget widget_banner background-image"
                            style="background-image: url(&quot;assets/img/bg/widget_banner.jpg&quot;);">
                            <div class="widget-banner position-relative text-center"><span class="icon"><i
                                        class="fa-solid fa-phone"></i></span> <span class="text">Need Help? Call
                                    Here</span> <a class="phone" href="tel:+25669872564">+256 6987 2564</a> <a
                                    href="contact.html" class="th-btn style6">Get A Quote <i
                                        class="fa-light fa-arrow-right-long"></i></a></div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>
@endsection
