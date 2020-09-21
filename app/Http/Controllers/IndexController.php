<?php

namespace App\Http\Controllers;

use App\Product;
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

    public function search(Request $request)
    {
        $query =  $request->input('query');
        if ($query != "" ) {
            $products = DB::table('products')->where('name', 'like', "%" . $query . "%")->paginate(15);
        } else {
            $products = DB::table('products')->paginate(15);
        }

        $user = auth()->user();

        return view('partials.index.index', compact('user', 'products', 'query'));
    }
}
