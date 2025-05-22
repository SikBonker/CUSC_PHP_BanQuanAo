<?php
// filepath: d:\xampp\htdocs\PHP_CUSC\Laravel\BanQuanAo\app\Http\Controllers\HomeController.php
namespace App\Http\Controllers;

use App\Models\Products;

class HomeController extends Controller
{
    public function index()
    {
        $products = Products::with('category')->get(); // Eager load the related category
        return view('home', compact('products'));
    }
}