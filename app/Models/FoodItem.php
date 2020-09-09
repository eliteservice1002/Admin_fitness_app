<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FoodItem extends Model
{
    //
    protected $fillable = [
        'food_name', 'food_categories_id', 'carbon', 'protein', 'fat', 'portion_in_grams'
    ];

    public function foodcategory() {
        return $this->belongsTo(FoodCategory::class, 'food_categories_id');
    }
}
