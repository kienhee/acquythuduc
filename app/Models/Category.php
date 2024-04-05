<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'categories';

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function categoryChildren()
    {
        return $this->hasMany(Category::class, 'category_id');
    }

    public static function getParentAndChildrenCategories()
    {
        $categories = Category::all();
        $result = [];

        foreach ($categories as $category) {
            if ($category->category_id == 0) {
                $result[] = [
                    "id" => $category->id,
                    "parent" => $category->name,
                    'slug' => $category->slug,
                    "children" => self::getChildren($categories, $category->id)
                ];
            }
        }

        return $result;
    }

    private static function getChildren($categories, $parentId)
    {
        $children = [];

        foreach ($categories as $category) {
            if ($category->category_id == $parentId) {
                $children[] = [
                    "name" => $category->name,
                    "slug" => $category->slug,
                    "children" => self::getChildren($categories, $category->id)
                ];
            }
        }

        return $children;
    }
}
