<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    function about(){
        return view('/pages.about-us');
    }

    function services(){
        return view('/pages.service');
    }

    function contact_us(){
        return view('/pages.contact-us');
    }

    function portfolio(){
        return view('/pages.portfolio');
    }
}