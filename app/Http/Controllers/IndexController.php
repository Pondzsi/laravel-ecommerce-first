<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{

    public function index()
    {
        $user = auth()->user();
        $products = DB::table('products')->paginate(15);

        return view('partials.index.index', compact('user', 'products'));
    }
}
