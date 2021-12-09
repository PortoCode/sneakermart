<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $logged_user = \Auth::user();
        return redirect(route('users.show', $logged_user->id));
    }

    /**
     * Display the home page.
     *
     * @return Response
     */
    public function show()
    {
        return view('public.home.index');
    }
}
