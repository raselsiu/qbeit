@extends('frontend.layouts.frontend_master')

@section('content')
    <div class="space">
        <div class="container">


            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif




            <div class="row gy-4">
                <div class="col-xl-5">
                    <div class="contact-infobox smoke-bg">
                        <div class="title-area"><span class="sub-title">Work With Us</span>
                            <h3 class="sec-title">Contact Information</h3>
                            <p class="sec-text">Thank you for your interest. We're excited to hear from
                                you and discuss...</p>
                        </div>
                        {{-- <div class="about-contact-grid inner-style"><span class="about-contact-icon"><i
                                    class="fa-solid fa-headphones-simple"></i></span>
                            <div class="about-contact-details"><span class="sec-text">Call Us For Query</span>
                                <p class="about-contact-details-text"><a href="tel:+256698253158">(+256) 69825-3158</a></p>
                            </div>
                        </div> --}}
                        <div class="about-contact-grid inner-style"><span class="about-contact-icon"><i
                                    class="fa-light fa-envelope-open-text"></i></span>
                            <div class="about-contact-details"><span class="sec-text">Email Us Anytime</span>
                                <p class="about-contact-details-text"><a href="mailto:info@atek.com">qbeit@gmail.com</a></p>
                            </div>
                        </div>
                        <div class="about-contact-grid inner-style"><span class="about-contact-icon"><i
                                    class="fa-thin fa-map-location-dot"></i></span>
                            <div class="about-contact-details"><span class="sec-text">Visit Our Office</span>
                                <p class="about-contact-details-text"><a href="#">14 Maniel Lane, Line Berlin</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-7">
                    <div class="contact-formbox ms-xl-3 ps-xl-3">
                        <form action="{{ route('storeContact') }}" method="POST" class="contact-form">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6 form-group"><input type="text" class="form-control" name="name"
                                        id="name3" placeholder="Your Name" required> <img src="assets/img/icon/user.svg"
                                        alt=""></div>
                                <div class="col-sm-6 form-group"><input type="email" class="form-control" name="email"
                                        id="email" placeholder="Email Address" required> <img
                                        src="assets/img/icon/mail.svg" alt=""></div>
                                <div class="form-group col-12">
                                    <textarea name="message" id="message" cols="10" rows="3" class="form-control" placeholder="Your Message"
                                        required></textarea> <img src="assets/img/icon/chat.svg" alt="">
                                </div>
                                <div class="form-btn col-12"><button type="submit" class="th-btn">Send<img
                                            src="assets/img/icon/plane4.svg" alt=""></button></div>
                            </div>
                            <p class="form-messages mb-0 mt-3"></p>
                        </form>
                    </div>
                </div>
            </div>  
        </div>
    </div>
@endsection


@push('fjs')
    <script>
        @if (session('msg'))
            Swal.fire(
                'Success!',
                '{{ session('msg') }}',
                'success'
            )
        @endif
    </script>
@endpush
