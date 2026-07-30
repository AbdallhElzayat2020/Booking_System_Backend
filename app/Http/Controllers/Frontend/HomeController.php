<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Hero;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $hero = Hero::first();
        $categories = Category::active()->showAtHome()->limit(8)->get();

        return view('frontend.home', [
            'hero' => $hero,
            'categories' => $categories,
        ]);
    }
}
