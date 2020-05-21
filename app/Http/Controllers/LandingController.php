<?php

namespace App\Http\Controllers;

class LandingController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function landing()
    {
        //return view('welcome');

        //lading page updated to login page
        return redirect('/login');
    }
}
