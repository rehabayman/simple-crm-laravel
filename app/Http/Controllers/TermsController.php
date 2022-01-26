<?php

namespace App\Http\Controllers;

class TermsController extends Controller
{
    public function index()
    {
        return view('terms');
    }

    public function store()
    {
        auth()->user()->update([
            'terms_accepted' => true
        ]);

        return redirect()->route('home');
    }
}
