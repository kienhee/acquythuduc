<?php

use App\Models\Agency;
use App\Models\Category;
use App\Models\Feedback;
use App\Models\Group;
use App\Models\Partner;
use App\Models\Product;
use App\Models\Project;
use App\Models\Province;
use App\Models\Setting;
use App\Models\Slider;
use App\Models\Tag;
use App\Models\User;

function getAllGroups()
{
    return Group::all();
}
function getAllCategories()
{
    return Category::all();
}
function getChildrenCategories()
{
    return Category::where('category_id', "<>", 0)->get();
}
function categoryMegaMenu()
{
    return Category::getParentAndChildrenCategories();
}

function estimateReadingTime($text, $wpm = 200)
{
    $totalWords = str_word_count(strip_tags($text));
    $minutes = floor($totalWords / $wpm);
    return $minutes;
}
function menuSelect($menu, $parent = 0, $level = 0)
{

    if ($menu->count() > 0) {
        $result = [];
        foreach ($menu as $key => $category) {
            if ($category['category_id'] == $parent) {
                $category['level'] = $level;
                $result[] = $category;
                // unset($menu[$category['id']]);
                $child = menuSelect($menu, $category['id'], $level + 1);
                $result = array_merge($result, $child);
            }
        }
        return $result;
    }
}

function menuTreeCategory($menu, $parentId = 0)
{
    if ($menu->count() > 0) {
        foreach ($menu as $key => $category) {
            if ($category['category_id'] == $parentId) {
                echo '<li><a class="d-flex justify-content-between" href ="' . route('dashboard.category.edit', $category['id']) . '" title="Click Read more"> <span>' . $category['name'] . '</span> </a>';
                echo '<ul >';
                // unset($menu[$category['id']]);
                echo menuTreeCategory($menu, $category['id']);
                echo "</ul>";
                echo "</li>";
                echo "</li>";
            }
        }
    }
}


function trendExist($trending, $checkID)
{
    return $trending->contains('project_id', $checkID);
}


function setting()
{
    return Setting::where('id', 1)->first();
}
function createSlug($string)
{
    // Convert the string to lowercase
    $string = strtolower($string);

    // Remove special characters
    $string = preg_replace('/[^a-z0-9\-]/', '', $string);

    // Replace spaces with hyphens
    $string = str_replace(' ', '-', $string);

    // Remove consecutive hyphens
    $string = preg_replace('/-+/', '-', $string);

    // Trim any leading or trailing hyphens
    $string = trim($string, '-');

    return $string;
}
function isRole($dataArr, $module, $role = 'view')
{
    if (!empty($dataArr)) {
        $roleArr = $dataArr[$module] ?? [];
        if (!empty($roleArr) && in_array($role, $roleArr)) {
            return true;
        }
    }
    return false;
}

function getSliders()
{
    return Slider::where('id', 1)->first();
}
function partners()
{
    return Partner::where('id', 1)->first();
}
function agencies()
{
    return Agency::orderBy('created_at', 'desc')->get();
}

function newProducts()
{
    return Product::orderBy('created_at', 'desc')->limit(5)->get();
}
