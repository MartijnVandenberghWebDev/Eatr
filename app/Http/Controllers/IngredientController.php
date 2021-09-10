<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\Ingredient;
use Illuminate\Http\Request;
use App\Models\IngredientCategory;

class IngredientController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth")->only(["store"]);
    }
    public function index() {
        $ingredients = Ingredient::with("ingredientCategory")->orderBy("ingredient_category_id")->orderBy("name")->paginate(12);
        $categories = IngredientCategory::get();
        return view("ingredients.index", ["ingredients" => $ingredients, "categories" => $categories]);
    }
    
    public function store(Request $request) {
        
        $category = IngredientCategory::find($request["category"]);
        $existingIngredient = Ingredient::where("name", $request["ingredient"]);

        if(!$existingIngredient->count()) {
        $this->validate($request, [
            "ingredient" => "required",
            "category" => "required|integer",
        ]);

        //flashbag??

        $category->ingredients()->create([
            "name" => $request["ingredient"],
        ]);
        }
        // return redirect()->route("ingredients");
        return back();
    }

    // public function attachToRecipe(Recipe $recipe, Request $request) {
    //     $this->validate($request, [
    //         "ingredient" => "required"
    //     ]);

    //     foreach($request as $ingredient) {
    //         $recipe->ingredient()->create(["ingredient_id" => $ingredient]);
    //     }

    //     return redirect()->route("recipes");
    // }
}
