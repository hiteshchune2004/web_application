<?php

namespace App\Controllers;

use Core\Controller;
use App\Models\Product;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        $product = new Product();
        $category = new Category();
        
        $featuredProducts = $product->getFeatured();
        $categories = $category->findAll();
        $totalProducts = count($product->findAll());

        return echo $this->render('home/index', [
            'featured' => $featuredProducts,
            'categories' => $categories,
            'total_products' => $totalProducts,
        ]);
    }
}
