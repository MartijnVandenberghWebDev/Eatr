<?php

namespace App\Http\Controllers;

use App\Models\IngredientCategory;
use Illuminate\Http\Request;

class IngredientCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware("admin");
    }
    public function index() {
        $categories = IngredientCategory::paginate(20);
        return view("ingredients.category.index", ["categories" => $categories]);
    }
    
    public function store(Request $request) {
        $this->validate($request, [
            "category" => "required",
        ]);

        IngredientCategory::create([
            "category" => $request["category"],
        ]);

        return back(); //back??
    }
}
