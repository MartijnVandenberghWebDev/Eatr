<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\Category;
use App\Models\Ingredient;
use App\Models\IngredientCategory;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function index() {
        $recipes = Recipe::with("category", "ingredient")->orderBy("created_at", "DESC")->paginate(10);
        return view("recipes.index", ["recipes" => $recipes]);
    }

    public function addRecipe() {
        $categories = Category::get();
        $ingredients = Ingredient::with("ingredientCategory")->orderBy("name")->get()->groupBy("ingredient_category_id");
        return view("recipes.create", ["categories" => $categories, "ingredients" => $ingredients]);
    }

    public function store(Request $request) {
        dd($request);
        $this->validate($request, [
            "name" => "required|max:50",
            "description" => "required",
            "category" => "required",
            "ingredient" => "required",
            "steps" => "required",
        ]);

        $recipe = Recipe::create([
            "name" => $request["name"],
            "description" => $request["description"],
            "steps" => $request["steps"],
        ]);

        foreach($request["category"] as $category) {
            $recipe->category()->create([
                "category_id" => $category->id,
            ]);
        }

        foreach($request["ingredient"] as $ingredient) {
            $recipe->ingredient()->create([
                "ingredient_id" => $ingredient->id,
            ]);
        }

        return redirect()->route("recipes");
    }
}
