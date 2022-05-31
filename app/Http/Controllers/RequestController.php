<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RequestController extends Controller
{
    public function index()
    {
        return view('index');
    }
    public function newRequest()
    {
        return view('new-request');
    }
    public function requests()
    {
        return view('requests');
    }
    public function myRequests()
    {
        return view('my-requests');
    }
    public function profile()
    {
        return view('profile');
    }
    public function help()
    {
        return view('help');
    }
    public function register()
    {
        return view('register');
    }
    public function login()
    {
        return view('login');
    }
}