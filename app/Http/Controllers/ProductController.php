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
        if ($image = $req->file('image')){
            $imageDestinationPath = 'upload/';
            $productImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($imageDestinationPath, $productImage);
            $product->image = $productImage;
        }
        $product->save();
        return $req->input();
    }

public function Display(Request $req){
         $product= Product::all();
         return $product;
}
public function viewDetail($id){
    $product = Product::find($id);
    return $product;
  
}

public function updateProduct(Request $req){
    $product = Product::find($req->id);
    $product->title = $req->input("title");
    $product->price = $req->input("price");
    $product->description = $req->input("description");
    if ($image = $req->file('image')){
        $imageDestinationPath = 'upload/';
        $productImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $image->move($imageDestinationPath, $productImage);
        $product->image = $productImage;
    }
    $product->save();
    return $product;
    }

    public function editPost($id){
        $product = Product::find($id);
        return $product;
    }
   


}


