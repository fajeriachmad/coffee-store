<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;

class GuestController extends Controller
{
    public function index()
    {
        return view('pages.guest.index', [
            'products' => Product::latest()->where('active', true)->paginate(9)
        ]);
    }
}
