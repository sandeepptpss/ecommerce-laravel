<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function addProduct(Request $req)
    {
        $imageNames = '';
        $product = new Product;
        $product->title = $req->input("title");
        $product->price = $req->input("price");
        $product->description = $req->input("description");
        
        if ($image = $req->file('image')) {
            $imageDestinationPath = 'upload/';
            $productImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($imageDestinationPath, $productImage);
            $product->image = $productImage;
        }
        
        $product->save();
        
        return $req->input();
    }
}


