<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Recipe;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::paginate(10);
        return view("categories.index", ["categories" => $categories]);
    }

    public function store(Request $request) {
        $this->validate($request, [
            "category" => "required",
        ]);

        $existingCategory = Category::where("category", $request["category"]);

        if(!$existingCategory->count()) {
            Category::create(["category" => $request["category"]]);
        }

        return back();
    }

    // public function attachToRecipe(Recipe $recipe, Request $request) {
    //     $this->validate($request, [
    //         "category" => "required"
    //     ]);

    //     foreach($request as $category) {
    //         $recipe->category()->create(["category_id" => $category]);
    //     }

    //     return redirect()->route("recipes");
    // }
}
