<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuideController extends Controller
{
    public function public()
    {
        return view('guide');
    }

    public function buyer()
    {
        return view('guide.buyer');
    }

    public function agent()
    {
        return view('guide.agent');
    }

    public function admin()
    {
        return view('guide.admin');
    }
}
