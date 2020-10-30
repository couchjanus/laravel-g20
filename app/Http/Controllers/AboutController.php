<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index() {
        // при помощи compact
        $title = 'Dashboard Page';
        return view('admin.index', compact('title'));
        // при помощи второго параметра хелпера
        return view('admin.index', ['title' => 'Dashboard Page']);
        // используя метод with
        return view('about.index')->with('title', 'About Us Page');
        // используя "магический" метод
        return view('admin.index')->withTitle('Dashboard Page');

    }
}
