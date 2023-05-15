<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    function addProduct(Request $req)
    {
        $product = new Product;
        $product->title = $req->input("title");
        $product->price = $req->input("price");
        $product->description = $req->input("description");

      
        $image_name = time().'.'.$req->image->extension();  
        $req->file->move(public_path('uploads'), $image_name);
        $product->image =$image_name;

        $product->save();
        return $req->input();
    }
}


