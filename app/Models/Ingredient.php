<?php

namespace App\Models;

use App\Models\IngredientCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ingredient extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
    ];

    public function ingredientCategory() {
        return $this->belongsTo(IngredientCategory::class);
    }
    
    public function recipe() {
        return $this->belongsToMany(Recipe::class);
    }
}
