<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryShowController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke($slug, Request $request)
    {
        $category = Category::where('slug', $slug)->firstOrFail();

        return view('category', compact('category'));
    }
}
