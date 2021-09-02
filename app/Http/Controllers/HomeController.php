<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Product;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\PostDec;

class HomeController extends Controller
{
    // /**
    //  * Create a new controller instance.
    //  *
    //  * @return void
    //  */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $fresh_category = Category::orderBy('created_at', 'DESC')->paginate(5);
        $all_category   = Category::where('order', 1)->orderBy('created_at', 'DESC')->get();
        $news           = Post::orderBy('id', 'DESC')->paginate(3);
        $products       = Product::orderBy('id', 'DESC')->get();

        return view('home', compact('fresh_category', 'all_category', 'news', 'products'));
    }
}
