<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductResource;

class ProductController extends Controller
{
    public function allProducts()
    {
        $products=Product::all();
        return ProductResource::collection($products);
    }
    public function oneProduct($id)
    {
        $product=Product::find($id);
        return new ProductResource($product);
    }
    public function storeProduct(ProductRequest $validatedData)
    {
        dd(Auth::user());
        $product=Product::create([
           'user_id'=>Auth::user()->id,
           'category_id'=>$validatedData['category_id'],
           'name'=>$validatedData['name'], 
           'price'=>$validatedData['price'], 
           'description'=>$validatedData['description'], 
           'img'=>$validatedData['img'], 
           'available_quantity'=>$validatedData['available_quantity'], 
        ]);
        return response('product added successfully',200);
    }
    public function updateProduct(ProductRequest $validatedData,$id)
    {
        $product=Product::find($id);
        $product->update([
            'user_id'=>Auth::user()->id,
            'category_id'=>$validatedData['category_id'],
            'name'=>$validatedData['name'], 
            'price'=>$validatedData['price'], 
            'description'=>$validatedData['description'], 
            'img'=>$validatedData['img'], 
            'available_quantity'=>$validatedData['available_quantity'], 
         ]);
         return response('product updated successfully',200);
    }
    public function deleteProduct($id)
    {
        $product=Product::find($id);
        $product->delete();
        return response('product deleted successfully',200);
    }
}
