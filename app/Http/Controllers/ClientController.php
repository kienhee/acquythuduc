<?php

namespace App\Http\Controllers;

use App\Models\Agency;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\Post;
use App\Models\Product;
use App\Models\Province;
use App\Models\Setting;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Termwind\Components\Raw;

class ClientController extends Controller
{
    public function home(Request $request)
    {
        $categories = Category::orderBy('created_at', 'desc')->get();
        $setting = Setting::where('id', 1)->first();
        $newPosts = Post::orderBy('created_at', 'desc')->limit(3)->get();
        $newProducts = Product::orderBy('created_at', 'desc')->limit(4)->get();
        $posts = Post::orderBy('created_at', 'desc')->paginate($setting->paginate_home);
        return view('client.index', compact('newPosts', 'posts', 'newProducts', 'categories'));
    }
    public function products()
    {
        $categories = Category::where('category_id', "<>", 0)->get();
        $productsByCategory = [];
        foreach ($categories as $category) {
            $products = Product::where('category_id', $category->id)->limit(6)->orderBy('created_at', 'desc')->get()->toArray();
            // count($products) >= 5 ->Khi nào cần thì cop vào
            if (!empty($products)) {
                $productsByCategory[] = [
                    'category_name' => $category->name,
                    'products' => $products
                ];
            }
        }
        return view('client.product', compact('productsByCategory'));
    }
    public function category($slug)
    {
        $category = Category::where('slug', $slug)->first();

        if ($category) {
            $setting = Setting::where('id', 1)->first();
            $products = Product::where('category_id', $category->id)->orderBy('created_at', 'desc')->paginate($setting->paginate_product);
            if (!$products) {
                abort(404);
            }
            $title = $category->name;
            return view('client.product', compact('products', "title"));
        } else {
            abort(404);
        }
    }
    public function search(Request $request)
    {
        $keyword = $request->keyword;
        $setting = Setting::where('id', 1)->first();
        $posts = Post::where('title', 'like', '%' . $request->keyword . '%')->orderBy('created_at', 'desc')->paginate($setting->paginate_search)->withQueryString();
        if (!$posts) {
            abort(404);
        }
        return view('client.search', compact('posts', "keyword"));
    }
    public function tag(Request $request)
    {
        $keyword = $request->keyword;
        $setting = Setting::where('id', 1)->first();
        $posts = Post::where('tags', 'like', '%' . $request->keyword . '%')->orderBy('created_at', 'desc')->paginate($setting->paginate_discover)->withQueryString();
        if (!$posts) {
            abort(404);
        }
        return view('client.tag', compact('posts', "keyword"));
    }
    public function blog()
    {
        $blogs = Post::orderBy('created_at', 'desc')->paginate(15)->withQueryString();
        return view('client.blog', compact('blogs'));
    }
    public function blogDetail($slug)
    {
        $post = Post::where('slug', $slug)->first();

        if ($post) {
            // Check if the post has been viewed in the current session
            if (!Session::has('viewed_post_' . $post->id)) {
                // If not, increment the view count and mark the post as viewed in the session
                $post->increment('views');
                Session::put('viewed_post_' . $post->id, true);
            }
            return view('client.blog-single', compact('post'));
        } else {
            abort(404);
        }
    }


    public function productDetail($slug)
    {
        $product = Product::where('slug', $slug)->first();
        return view('client.product-single', compact('product'));
    }


    public function contactGet()
    {
        return view('client.contact');
    }
}
