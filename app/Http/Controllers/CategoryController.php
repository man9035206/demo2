<?php

namespace App\Http\Controllers;

use App\Category;
use App\SubCategory;
use Illuminate\Http\Request;
use Response;
use Illuminate\Support\Facades\Input;

class CategoryController extends Controller
{
    public function index()
    {
        $categories=Category::all();
        return view('ajax_dropdown.index',compact('categories'));
    }
    public function getSubcategory(Request $r)
    {
        $cat_id=Input::get('cat_id');
        $sub_categories = SubCategory::where('category_id','=',$cat_id)->get();
        return response()->json($sub_categories);
    }
}
