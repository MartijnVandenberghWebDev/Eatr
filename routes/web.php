<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\IngredientCategoryController;
use App\Http\Controllers\IngredientController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', [RecipeController::class, 'index'])->name('recipes');

Route::get('/recipes/create', [RecipeController::class, 'addRecipe'])->name("recipes.store");
Route::post('/recipes/create', [RecipeController::class, 'store']);

Route::get('/ingredients/categories', [IngredientCategoryController::class, 'index'])->name('ingredients.categories');
Route::post('/ingredients/categories', [IngredientCategoryController::class, 'store']);

Route::get('/ingredients', [IngredientController::class, 'index'])->name('ingredients');
Route::post('/ingredients', [IngredientController::class, 'store']);

Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
Route::post('/categories', [CategoryController::class, 'store']);