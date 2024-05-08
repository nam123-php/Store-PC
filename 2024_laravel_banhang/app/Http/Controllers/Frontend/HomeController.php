<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slide;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $slides = Slide::all();
        $categories = Category::orderByDesc('id')->get();


        $categoriesHome = Category::with('products')
            ->whereHas('products', function ($query) {
                $query->orderByDesc('id')->limit(10);
            })->orderByDesc('id')->limit(3)->get();


        $productsBuy = Product::where('status', Product::STATUS_SUCCESS)
            ->where('count_buy', '>', 0)
            ->orderByDesc('count_buy')->limit(10)->get();

        $products = Product::with('category')->where('status', Product::STATUS_SUCCESS)
            ->orderByDesc('id')->limit(12)->get();

        $viewData = [
            'slides'         => $slides,
            'categories'     => $categories,
            'products'       => $products,
            'categoriesHome' => $categoriesHome,
            'productsBuy'    => $productsBuy
        ];

        if (config('app.layout_admin') == 'v1') {
            return view('frontend.home.index', $viewData);
        }

        return view('frontend.v2.home.index', $viewData);
    }
}
