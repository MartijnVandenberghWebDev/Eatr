<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Recipe extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "description",
        "steps",
        "user_id",
    ];

    public function category() {
        return $this->belongsToMany(Category::class);
    }

    public function ingredient() {
        return $this->belongsToMany(Ingredient::class);
    }
}
