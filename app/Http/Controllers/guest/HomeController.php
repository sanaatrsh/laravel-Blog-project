<?php

namespace App\Http\Controllers\guest;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::all();


        return view('guest.pages.index', [
            'categories' => $categories
        ]);
    }
    public function about()
    {
        return view('guest.pages.about');
    }
    public function contact()
    {
        return view('guest.pages.contact');
    }
}
