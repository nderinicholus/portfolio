<?php

namespace App\Models;

use App\Http\Controllers\BlogController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    use HasFactory;

    protected $table = 'blog_categories';

    public function blogs() {
        return $this->hasMany(Blog::class);
        // return $this->hasMany(Blog::class, 'blogcategory_id');
    }
}
