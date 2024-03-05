<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\product;

class GuestController extends Controller
{
    public function index()
    {
        return view('pages.guest.index', [
            'products' => Product::latest()->where('active', true)->paginate(9),
            'posts' => Post::latest()->paginate(2)
        ]);
    }
}
