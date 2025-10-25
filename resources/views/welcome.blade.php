@extends('frontend.layouts.frontend_master')
@section('content')
    @if ($sliders->isNotEmpty())
        <div class="th-hero-wrapper hero-1" id="hero">
            <div class="swiper th-slider hero-slider-1" id="heroSlide1"
                data-slider-options='{"effect":"fade","menu": ["", "", ""],"heroSlide1": {"swiper-container": {"pagination": {"el": ".swiper-pagination", "clickable": true }}}}'>
                <div class="swiper-wrapper">
                    @foreach ($sliders as $slide)
                        <div class="swiper-slide">
                            <div class="hero-inner">
                                <div class="th-hero-bg" data-bg-src="{{ asset('upload/slider/' . $slide->image) }}">
                                    <div class="hero-overlay"></div>
                                </div>
                                <div class="hero-1-shape d-none d-lg-block" data-ani="slideinleft" data-ani-delay="0.4s">
                                    <img src="{{ asset('frontend/assets/img/shape/hero-1-shape.png') }}" alt="hero-shape">
                                </div>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-xl-9 col-lg-8">
                                            <div class="hero-style1">
                                                <h1 class="hero-title" data-ani="slideinup" data-ani-delay="0.4s">
                                                    {{ $slide->title }}
                                                </h1>
                                                <p class="hero-text text-white" data-ani="slideinup" data-ani-delay="0.6s">
                                                    {{ $slide->subtitle }}
                                                </p>
                                                <div class="btn-group" data-ani="slideinup" data-ani-delay="0.8s"><a
                                                        href="{{ route('contactus') }}"
                                                        class="th-btn style7 th-icon">Contact Us</a><a href="#service-sec"
                                                        class="th-btn style2 th-icon">Our
                                                        Services</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
                <div class="th-swiper-custom"><button data-slider-prev="#heroSlide1" class="slider-arrow slider-prev"><img
                            src="{{ asset('frontend/assets/img/icon/right-arrow.svg') }}" alt=""></button>
                    <div class="slider-pagination"></div><button data-slider-next="#heroSlide1"
                        class="slider-arrow slider-next"><img src="{{ asset('frontend/assets/img/icon/left-arrow.svg') }}"
                            alt=""></button>
                </div>
            </div>
        </div>
    @else
    @endif


    @if ($banners->isNotEmpty())
        <section class="">
            <div class="feature-list-wrap">
                <div class="feature-area overflow-hidden" id="feature-area">
                    <div class="row gx-0 justify-content-center">
                        @foreach ($banners as $banner)
                            <div class="col-xl-4 col-lg-6">
                                <div class="feature-item d-flex align-items-start">
                                    <div class="feature-item_icon"><img src="{{ asset('upload/banner/' . $banner->image) }}"
                                            alt="icon">
                                    </div>
                                    <div class="media-body">
                                        <h3 class="box-title text-anime-style-2">{{ $banner->title }}</h3>
                                        <p class="feature-item_text wow fadeInUp">{{ $banner->subtitle }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
        </section>
    @else
    @endif



    @if ($whoweare && $whoweare->count() > 0)
        <div class="about-area position-relative overflow-hidden space" id="about-sec">
            <div class="container">
                <div class="row gy-40">
                    <div class="col-xl-6 col-lg-6">
                        <div class="title-area mb-20"><span class="sub-title style1 text-anime-style-2">Who We Are</span>
                            <h2 class="sec-title mb-20 text-anime-style-3">{{ $whoweare->title }}</h2>
                            <p class="sec-text mb-60 wow fadeInUp" data-wow-delay=".2s">{{ $whoweare->description }}</p>
                        </div>
                        <div class="img-box8">
                            <div class="row gy-4">
                                <div class="col-xl-6 col-md-6 col-sm-6">
                                    <div class="img1 reveal mb-0"><img
                                            src="{{ asset('upload/who_we_are/' . $whoweare->feature_image_one) }}"
                                            alt="About">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-md-6 col-sm-6">
                                    <div class="img2 reveal mb-0"><img
                                            src="{{ asset('upload/who_we_are/' . $whoweare->feature_image_two) }}"
                                            alt="About">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="img-box8 ms-xl-5">
                            <div class="img3 reveal"><img
                                    src="{{ asset('upload/who_we_are/' . $whoweare->feature_image_right) }}"
                                    alt="About">
                            </div>
                            <div class="about-item-wrap">
                                <div class="about-item wow fadeInUp" data-wow-delay=".3s">
                                    <div class="about-item_img"><img
                                            src="{{ asset('frontend/assets/img/icon/shield.svg') }}" alt="">
                                    </div>
                                    <div class="about-item_centent">
                                        <h5 class="box-title">{{ $whoweare->feature_one_title }}</h5>
                                        <p class="about-item_text">{{ $whoweare->feature_one_desc }}</p>
                                    </div>
                                </div>
                                <div class="about-item wow fadeInUp" data-wow-delay=".4s">
                                    <div class="about-item_img"><img
                                            src="{{ asset('frontend/assets/img/icon/shield.svg') }}" alt="">
                                    </div>
                                    <div class="about-item_centent">
                                        <h5 class="box-title">{{ $whoweare->feature_two_title }}</h5>
                                        <p class="about-item_text">{{ $whoweare->feature_two_desc }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-35 wow fadeInUp" data-wow-delay=".5s"><a href="about.html"
                                    class="th-btn black-btn th-radius th-icon">Learn More </a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
    @endif




    @if ($offers->isNotEmpty())
        <section class="position-relative bg-top-center overflow-hidden space" id="service-sec"
            data-bg-src="assets/img/bg/service_bg_1.jpg">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="title-area service-title-box text-center"><span
                                class="sub-title mb-15 text-anime-style-2">What We’re Offering</span>
                            <h2 class="sec-title text-anime-style-2">Dealing in all professional IT services</h2>
                            <p class="sec-text mb-50 wow fadeInUp" data-wow-delay=".4s">IT solutions refer to a broad
                                range
                                of services and technologies designed to address<br>specific business needs, streamline
                                operations, and drive growth.</p>
                        </div>
                    </div>
                </div>

                <div class="slider-area slider-drag-wrap">
                    <div class="swiper th-slider has-shadow"
                        data-slider-options='{"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"1"},"768":{"slidesPerView":"2"},"992":{"slidesPerView":"2"},"1200":{"slidesPerView":"3"},"1300":{"slidesPerView":"4"}}}'>
                        <div class="swiper-wrapper">
                            @foreach ($offers as $offer)
                                <div class="swiper-slide">
                                    <div class="service-box service-style-1 gsap-cursor">
                                        <div class="service-img"><a href="service-details.html"><img
                                                    src="{{ asset('upload/what_we_offer/' . $offer->image) }}"
                                                    alt=""></a></div>
                                        <div class="service-content">
                                            <h3 class="box-title"><a href="service-details.html">{{ $offer->title }}</a>
                                            </h3>
                                            <p class="service-box_text">{!! Str::limit($offer->description, 80) !!}</p>
                                            <a class="th-btn style4"
                                                href="{{ route('singleService', $offer->slug) }}">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
        </section>
    @else
    @endif


    @if ($teams->isNotEmpty())
        <section class="bg-smoke space overflow-hidden"
            data-bg-src="{{ asset('frontend/assets/img/bg/team_bg_1.png') }}">
            <div class="container z-index-common">
                <div class="title-area text-center"><span class="sub-title text-anime-style-2">Our Team Memners</span>
                    <h2 class="sec-title text-anime-style-3">Meet Our Expert Members</h2>
                </div>
                <div class="slider-area">
                    <div class="swiper th-slider teamSlider1 has-shadow" id="teamSlider1"
                        data-slider-options='{"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"1"},"768":{"slidesPerView":"2"},"992":{"slidesPerView":"3"},"1200":{"slidesPerView":"4"}}}'>
                        <div class="swiper-wrapper">
                            @foreach ($teams as $tm)
                                <div class="swiper-slide">
                                    <div class="th-team team-box">
                                        <div class="team-img"><img src="{{ asset('upload/team/' . $tm->image) }}"
                                                alt="Team"></div>
                                        <div class="team-content">
                                            <div class="media-body">
                                                <h3 class="box-title"><a
                                                        href="team-guider-details.html">{{ $tm->name }}</a>
                                                </h3>
                                                <span class="team-desig">{{ $tm->designation }}</span>
                                                <div class="th-social">

                                                    <a target="" href="{{ $tm->fb }}">
                                                        <i class="fab fa-facebook-f"></i>
                                                    </a>
                                                    <a target="" href="{{ $tm->twitter }}">
                                                        <i class="fab fa-twitter"></i>
                                                    </a>
                                                    <a target="" href="{{ $tm->linkd }}">
                                                        <i class="fab fa-linkedin-in"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                        <div class="slider-pagination"></div>
                    </div>
                </div>
            </div>
        </section>
    @else
    @endif



    @if ($testimonials->isNotEmpty())
        <section class="testi-area overflow-hidden space-top" id="testi-sec">
            <div class="container-fluid p-0">
                <div class="title-area mb-20 text-center"><span class="sub-title text-anime-style-2">Testimonial</span>
                    <h2 class="sec-title text-anime-style-3">Hear From Our Satisfied Clients</h2>
                </div>
                <div class="slider-area">
                    <div class="swiper th-slider testiSlider6 has-shadow" id="testiSlider1"
                        data-slider-options='{"breakpoints":{"0":{"slidesPerView":1},"767":{"slidesPerView":"2","centeredSlides":"true"},"992":{"slidesPerView":"2","centeredSlides":"true"},"1200":{"slidesPerView":"2","centeredSlides":"true"},"1400":{"slidesPerView":"3","centeredSlides":"true"}}}'>
                        <div class="swiper-wrapper">
                            @foreach ($testimonials as $testim)
                                <div class="swiper-slide">
                                    <div class="testi-card style2">
                                        <div class="testi-card_wrapper">
                                            <div class="testi-card_review"><i class="fa-solid fa-star"></i> <i
                                                    class="fa-solid fa-star"></i> <i class="fa-solid fa-star"></i> <i
                                                    class="fa-solid fa-star"></i> <i class="fa-solid fa-star"></i>
                                            </div>
                                        </div>
                                        <p class="testi-card_text">{{ $testim->desc }}
                                        </p>
                                        <div class="testi-card-quote">
                                            <img src="{{ asset('upload/testimonial/' . $testim->image) }}"
                                                alt="img">
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </section>
    @else
    @endif


    @if ($wcus && $wcus->isNotEmpty())
        <div class="bg-smoke overflow-hidden space">
            <div class="container">
                <div class="row gy-4 align-items-center">
                    <div class="col-lg-6 order-1 order-lg-0">
                        <div class="title-area"><span class="sub-title style1 text-anime-style-2">Why Choose Us</span>
                            <h2 class="sec-title text-anime-style-2">{{ $wcus->title }}</h2>
                            <p class="sec-text me-xl-5 wow fadeInUp" data-wow-delay=".3s">{!! $wcus->desc !!}</p>
                        </div>
                        <div class="choose-about wow fadeInUp">
                            <div class="choose-about_icon"><img
                                    src="{{ asset('upload/why_choose_us/' . $wcus->feature_1_img) }}" alt="image">
                            </div>
                            <div class="media-body">
                                <h3 class="box-title">{{ $wcus->feature_1_title }}</h3>
                                <p class="choose-about_text pe-xl-5 me-xl-5">{{ $wcus->feature_1_desc }}</p>
                            </div>
                        </div>
                        <div class="choose-about wow fadeInUp">
                            <div class="choose-about_icon"><img
                                    src="{{ asset('upload/why_choose_us/' . $wcus->feature_2_img) }}" alt="image">
                            </div>
                            <div class="media-body">
                                <h3 class="box-title">{{ $wcus->feature_2_title }}</h3>
                                <p class="choose-about_text pe-xl-5 me-xl-5">{{ $wcus->feature_2_desc }}</p>
                            </div>
                        </div>
                        <div class="choose-about wow fadeInUp">
                            <div class="choose-about_icon"><img
                                    src="{{ asset('upload/why_choose_us/' . $wcus->feature_3_img) }}" alt="image">
                            </div>
                            <div class="media-body">
                                <h3 class="box-title">{{ $wcus->feature_3_title }}</h3>
                                <p class="choose-about_text pe-xl-5 me-xl-5">{{ $wcus->feature_3_desc }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 order-0 order-lg-1">
                        <div class="choose-wrapp">
                            <div class="img1 global-img"><img
                                    src="{{ asset('upload/why_choose_us/' . $wcus->section_img_1) }}" alt="Choose">
                            </div>
                            <div class="img1 global-img"><img
                                    src="{{ asset('upload/why_choose_us/' . $wcus->section_img_2) }}" alt="Choose">
                            </div>
                            <div class="img1 global-img"><img
                                    src="{{ asset('upload/why_choose_us/' . $wcus->section_img_3) }}" alt="Choose">
                            </div>
                            <div class="img1 global-img"><img
                                    src="{{ asset('upload/why_choose_us/' . $wcus->section_img_4) }}" alt="Choose">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
    @endif



    @if ($wwithus)
        <section class="cta-area-3 overflow-hidden">
            <div class="cta-wrap3 bg-title space overflow-hidden">
                <div class="container">
                    <div class="row gy-50 justify-content-center align-items-center">
                        <div class="col-lg-8 order-lg-2">
                            <div class="title-area text-center mb-30"><span class="sub-title text-white"><span
                                        class="squre-shape left me-2"></span>Work With Us<span
                                        class="squre-shape right ms-2"></span></span>
                                <h2 class="sec-title text-white"><span
                                        class="scroll-text-ani2">{{ $wwithus->title }}</span></h2>
                            </div>
                            <div class="btn-wrap justify-content-center"><a href="project.html"
                                    class="th-btn style3 th-radius th-icon">Start A Projects</a>
                                <div class="call-btn style2">
                                    <div class="icon-btn text-white"><i class="far fa-envelope"></i></div>
                                    <div class="btn-content">
                                        <h6 class="btn-title">
                                            <a class="text-white" href="mailto:{{ $wwithus->email }}">Send Us a
                                                Mail</a>
                                        </h6>
                                        <span class="btn-text text-gray2">For any Queries</span>
                                        </a>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @else
    @endif



    @if ($posts->isNotEmpty())
        <section class="overflow-hidden space bg-smoke overflow-hidden" id="blog-sec">
            <div class="container">
                <div class="mb-30 text-center text-md-start">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-md-7">
                            <div class="title-area mb-md-0"><span class="sub-title text-anime-style-2">Blog and
                                    Article</span>
                                <h2 class="sec-title text-anime-style-3">News & Articles From QBeIT</h2>
                            </div>
                        </div>
                        <div class="col-md-auto wow fadeInUp"><a href="{{ route('posts') }}"
                                class="th-btn style4 th-icon">See
                                More
                                Articles</a></div>
                    </div>
                </div>
                <div class="slider-area">
                    <div class="swiper th-slider has-shadow" id="blogSlider1"
                        data-slider-options='{"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"1"},"768":{"slidesPerView":"2"},"992":{"slidesPerView":"2"},"1200":{"slidesPerView":"3"}}}'>
                        <div class="swiper-wrapper">
                            @foreach ($posts as $post)
                                <div class="swiper-slide">
                                    <div class="blog-box th-ani">
                                        <div class="blog-img global-img"><img
                                                src="{{ asset('upload/posts/' . $post->image) }}" alt="blog image">
                                        </div>
                                        <div class="blog-box_content">
                                            <div class="blog-meta"><a class="author"
                                                    href="{{ route('singlePost', $post->slug) }}"><i
                                                        class="fa-regular fa-calendar" style="color: black"></i>
                                                    {{ $post->created_at->format('d M, Y') }}</a>
                                            </div>
                                            <h3 class="box-title"><a
                                                    href="{{ route('singlePost', $post->slug) }}">{{ $post->title }}</a>
                                            </h3><a href="{{ route('singlePost', $post->slug) }}"
                                                class="th-btn style4 th-icon">Read More
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>

        </section>
    @else
    @endif

@endsection
