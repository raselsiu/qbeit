<?php

namespace App\Http\Controllers;

use App\Models\Backend\Banner;
use App\Models\Backend\Slider;
use App\Models\Category;
use App\Models\Offer;
use App\Models\Post;
use App\Models\Team;
use App\Models\Testimonial;
use App\Models\WhoWeAre;
use App\Models\WhyChooseUs;
use App\Models\WorkWithUs;

class FrontPageController extends Controller
{
    public function welcomePage()
    {

        $data['sliders'] = Slider::all();
        $data['banners'] = Banner::all();
        $data['whoweare'] = WhoWeAre::first();
        $data['offers'] = Offer::all();
        $data['teams'] = Team::all();
        $data['testimonials'] = Testimonial::all();
        $data['wcus'] = WhyChooseUs::first();
        $data['wwithus'] = WorkWithUs::first();
        $data['posts'] = Post::all();
        return view('welcome', $data);
    }
    public function contactus()
    {
        return view('frontend.pages.contact');
    }
    public function singleService($slug)
    {
        $service = Offer::where('slug',$slug)->first();
        return view('frontend.pages.single_service',compact('service'));
    }
    public function singlePost($slug)
    {
        $post['post'] = Post::where('slug',$slug)->first();
        $post['latest'] = Post::latest()->take(5)->get();
        $post['categories'] = Category::all();
        return view('frontend.pages.single_post', $post);
    }
    public function posts()
    {
        $data['posts'] = Post::all();
        $data['categories'] = Category::all();
        return view('frontend.pages.posts', $data);
    }
    public function findPostByCategory($categoryName)
    {
        $posts['posts'] = Post::where('category', $categoryName)->get();
        return view('frontend.pages.posts', $posts);
    }
}
