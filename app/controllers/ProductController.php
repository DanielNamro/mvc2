<?php
namespace App\Controllers;

use \App\Models\Product;
use App\Models\ProductType;

class ProductController  
{
    public function __construct()
    {
        // echo "en ProductController<br>";
    }
    public function index()
    {
        $products = Product::all();
        
        include('../views/product/index.php');
    }
    

    public function edit($arguments)
    {
        $id = $arguments['0'];
        $product = Product::find($id);
        $types = ProductType::all();
        include('../views/product/edit.php');                
    }
    public function create()
    {
        $types = ProductType::all();
        include('../views/product/create.php');        
    }

    public function store()
    {
        $product = new Product;
        $product->name = $_POST['name'];
        $product->type_id = $_POST['type_id'];
        $product->price = $_POST['price'];
        $product->insert();
        header('Location: /product');
    }
}
