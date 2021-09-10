<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IngredientCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        "category",
    ];

    public function ingredients() {
        return $this->hasMany(Ingredient::class);
    }
}
