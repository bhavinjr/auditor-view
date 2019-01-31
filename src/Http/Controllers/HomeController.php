<?php

namespace Bhavinjr\Viewdit\Http\Controllers;

class HomeController extends Controller
{
    /**
     * Single page application catch-all route.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('viewdit::app');
    }
}
