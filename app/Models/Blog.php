<?php

namespace App\Models;

use App\Http\Controllers\BlogCategoriesController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    public function blog_categories() {
        return $this->belongsTo(BlogCategoriesController::class);
    }
}
