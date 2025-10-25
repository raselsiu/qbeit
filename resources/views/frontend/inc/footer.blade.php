<?php $posts = App\Models\Post::latest()->take(5)->get(); ?>


<footer class="footer-wrapper footer-layout1 black-bg space-top">
    <div class="widget-area">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-md-6 col-xl-3">
                    <div class="widget footer-widget">
                        <div class="th-widget-about">
                            <div class="about-logo">
                                <!-- <a href="index.html"><img src="" alt="QBeIT"></a> -->
                                <h3 style="color: white;">Logo</h3>
                            </div>
                            <p class="about-text">Titan Court
                                2nd Floor,
                                3 Bishop Square,
                                Hatfield, Hertfordshire, United Kingdom, AL10 9NA</p>
                            <div class="th-social"><a href="https://www.facebook.com/"><i
                                        class="fab fa-facebook-f"></i></a> <a href="https://www.twitter.com/"><i
                                        class="fab fa-twitter"></i></a> <a href="https://www.linkedin.com/"><i
                                        class="fab fa-linkedin-in"></i></a> <a href="https://www.whatsapp.com/"><i
                                        class="fab fa-whatsapp"></i></a> <a href="https://instagram.com/"><i
                                        class="fab fa-instagram"></i></a></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-auto">
                    <div class="widget widget_nav_menu footer-widget">
                        <h3 class="widget_title">Useful Link</h3>
                        <div class="menu-all-pages-container">
                            <ul class="menu">
                                <li><a href="index.html">Home</a></li>
                                <li><a href="about.html">About us</a></li>
                                <li><a href="service.html">Our Service</a></li>
                                <li><a href="contact.html">Terms of Service</a></li>
                                <li><a href="service.html">News & Media</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-auto">
                    <div class="widget footer-widget">
                        <h3 class="widget_title">Get In Touch</h3>
                        <div class="th-widget-contact">
                            <div class="info-box_text">
                                <div class="icon"><img src="{{ asset('frontend/assets/img/icon/envelope.svg') }}"
                                        alt="img">
                                </div>
                                <div class="details">
                                    <p><a href="mailto:mailinfo00@QBeIT.com"
                                            class="info-box_link">mailinfo00@QBeIT.com</a></p>
                                    <p><a href="mailto:support24@QBeIT.com"
                                            class="info-box_link">support24@QBeIT.com</a></p>
                                </div>
                            </div>
                            <div class="info-box_text">
                                <div class="icon"><img src="{{ asset('frontend/assets/img/icon/location-dot.svg') }}"
                                        alt="img">
                                </div>
                                <div class="details">
                                    <p><a href="https://maps.app.goo.gl/QyH2fFoJ9fii93mt7" target="_blank">
                                            Hatfield, Hertfordshire, United Kingdom, AL10 9NA</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-auto">
                    <div class="widget footer-widget">
                        <h3 class="widget_title">Recent Posts</h3>
                        <div class="sidebar-gallery">
                            @foreach ($posts as $post)
                                <div class="gallery-thumb"><img src="{{ asset('upload/posts/' . $post->image) }}"
                                        alt="Gallery Image">
                                    <a target="_blank" href="https://www.instagram.com/" class="gallery-btn"><i
                                            class="fas fa-eye"></i></a>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-wrap">
        <div class="container">
            <div class="row justify-content-lg-between align-items-center">
                <div class="col-lg-6">
                    <p class="copyright-text">Copyright © 2025 <a href="index.html">QBeIT</a>. All Rights
                        Reserved.
                    </p>
                </div>
                <div class="col-lg-6 text-center text-lg-end">
                    <div class="footer-links">
                        <ul>
                            <li><a href="about.html">Terms & Conditions</a></li>
                            <li><a href="about.html">Careers</a></li>
                            <li><a href="about.html">Privacy Policy</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<div class="scroll-top"><svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"
            style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 307.919;">
        </path>
    </svg>
</div>

<script src="{{ asset('frontend/assets/js/vendor/jquery-3.7.1.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/app.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/main.js') }}"></script>

@stack('fjs')
</body>

</html>
