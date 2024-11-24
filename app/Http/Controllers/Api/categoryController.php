<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;

class categoryController extends Controller
{
    public function allCategories()
    {
        $categories=Category::all();
        return $categories;
    }
    public function oneCategory($id)
    {
        $category=Category::find($id);
        return $category;
    }
    public function storeCategory(CategoryRequest $validatedData)
    {
        $category=Category::create([
           'name'=>$validatedData['name'], 
        ]);
        return response('category added successfully',200);
    }
    public function updateCategory(CategoryRequest $validatedData,$id)
    {
        $category=Category::find($id);
        $category->update([
            'name'=>$validatedData['name'], 
        ]);
        return response('category updated successfully',200);
    }
    public function deleteCategory($id)
    {
        $category=Category::find($id);
        $category->delete();
        return response('category deleted successfully',200);
    }
}
