<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\Category;
use App\Models\Ingredient;
use App\Models\IngredientCategory;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function index()
    {
        $recipes = Recipe::with("category", "ingredient")->orderBy("created_at", "DESC")->paginate(10);
        return view("recipes.index", ["recipes" => $recipes]);
    }

    public function addRecipe()
    {
        $categories = Category::get();
        $ingredients = Ingredient::with("ingredientCategory")->orderBy("name")->get()->groupBy("ingredient_category_id");
        return view("recipes.create", ["categories" => $categories, "ingredients" => $ingredients]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            "title" => "required|max:50",
            "description" => "required",
            // "categoryArray" => "required",
            // "ingredientArray" => "required",
            // "stepArray" => "required",
        ]);

        $recipe = auth()->user()->recipes()->create([
            "title" => $request["title"],
            "description" => $request["description"],
            "steps" => $request["stepArray"],
            "user_id" => auth()->user()->id
        ]);

        $ingredients = explode("/", $request["ingredientArray"]);
        foreach ($ingredients as $ingredient) {
            $recipe->ingredient()->attach([
                "ingredient_id" => (int) $ingredient,
            ]);
        }

        $categories = explode('/', $request["categoryArray"]);
        foreach ($categories as $category) {
            // dd("done");
            $recipe->category()->attach([
                "category_id" => (int) $category,
            ]);
        }

        return redirect()->route("recipes");
    }
}
