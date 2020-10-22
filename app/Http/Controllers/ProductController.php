<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
class ProductController extends Controller
{
    public function show()
    {
    	$product_list = product::all();
    	return view('product.product_list',compact('product_list'));
    }
}
