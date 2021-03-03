<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function home() {
         return view('layouts.dashboard');
    }

    public function index() {
        return view('pages.home');
    }


    public function contact() {
        return view('pages.contact');
    }

    public function services() {
        return view('pages.services');
    }

    public function technologies() {
        return view('pages.technologies');
    }

    public function company() {
        return view("pages.company");
    }
}
