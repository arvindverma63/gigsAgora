<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebsitePageController extends Controller
{
    public function index(){
        return view('website.index');
    }
    public function contact(){
        return view('website.contact');
    }
    public function about(){
        return view('website.about');
    }
    public function quotes(){
        return view('website.get-a-quote');
    }
    public function pricing(){
        return view('website.pricing');
    }
    public function serviceDetails(){
        return view('website.service-details');
    }
    public function services(){
        return view('website.services');
    }
    public function starter(){
        return view('website.starter-page');
    }
}
