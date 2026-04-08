<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function about()
    {
        // Placeholder until view is created
        return view('about');
    }

    public function destinations()
    {
        return view('destinations');
    }

    public function packages()
    {
        return view('packages');
    }

    public function contact()
    {
        return view('contact');
    }

    public function blog()
    {
        return view('blog');
    }


    public function packageDetails($id = null)
    {
        return view('package_details', ['id' => $id]);
    }

    public function blogDetails($id = null)
    {
        return view('blog_details', ['id' => $id]);
    }
}

