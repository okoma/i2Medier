<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class SiteController extends Controller
{
    public function services(): View
    {
        return view('site.services');
    }

    public function about(): View
    {
        return view('site.about');
    }

    public function terms(): View
    {
        return view('site.terms');
    }

    public function privacy(): View
    {
        return view('site.privacy');
    }
}
