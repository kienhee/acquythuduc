<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Jobs\sendEmailNotice;
use App\Models\Post;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
  public function index(Request $request)
  {
    $result = Post::query();

    if ($request->has('keywords') && $request->keywords != null) {
      $result->where('name', 'like', '%' . $request->keywords . '%');
    }

    // if ($request->has('category_id') && $request->category_id != null) {
    //   $result->where('category_project_id',  $request->category_id);
    // }

    if ($request->has('sort') && $request->sort != null) {
      $result->orderBy('created_at', $request->sort);
    } else {
      $result->orderBy('created_at', 'desc');
    }
    if ($request->has('status') && $request->status != null && $request->status == 'active') {
      $result->where('deleted_at', "=", null);
    } elseif ($request->has('status') && $request->status != null && $request->status == 'inactive') {
      $result->onlyTrashed();
    } else {
      $result->withTrashed();
    }
    $totalPost = Post::count();
    $posts = $result->paginate(10);

    return view('admin.post.index', compact('posts', 'totalPost'));
  }

  public function add()
  {
    return view('admin.post.add');
  }

  public function store(Request $request)
  {

    $data  = $request->validate([
      'title' => "required|max:255|unique:posts,title",
      'slug' => "required|max:255|unique:posts,slug",
      'description' => "required|max:255",
      'content' => 'required',
      'cover' => 'required|image|mimes:jpeg,png,jpg',
    ]);
    if ($request->hasFile('cover')) {
      $file = $request->file('cover');

      $filename = $file->hashName();
      $path = $file->storePubliclyAs('public/photos/1/posts', $filename);
      $url = Storage::url($path);
      $data['cover'] = $url;
    }

    $check = Post::insert($data);

    if ($check) {
      return back()->with('msgSuccess', 'Create post successfully');
    }
    return back()->with('msgError', 'Create post failed!');
  }

  public function edit(Post $post)
  {
    return view('admin.post.edit', compact('post'));
  }

  public function update(Request $request, $id)
  {

    $data  = $request->validate([
      'title' => "required|max:255|unique:posts,title," . $id,
      'slug' => "required|max:255|unique:posts,slug," . $id,
      'description' => "required|max:255",
      'content' => 'required',
      'cover' => 'nullable',
    ]);
    if ($request->hasFile('cover')) {
      $file = $request->file('cover');
      $filename = $file->hashName();
      $path = $file->storePubliclyAs('public/photos/1/posts', $filename);
      $url = Storage::url($path);
      $data['cover'] = $url;
    }

    $check = Post::where(
      'id',
      $id
    )->update($data);
    if ($check) {
      return back()->with('msgSuccess', 'Update post successfully');
    }
    return back()->with('msgError', 'Update post failed!');
  }

  public function softDelete($id)
  {
    $check = Post::destroy($id);
    if ($check) {
      return back()->with('msgSuccess', 'Change status successful');
    }
    return back()->with('msgError', 'Change status failed!');
  }

  public function restore($id)
  {
    $check = Post::onlyTrashed()->where('id', $id)->restore();
    if ($check) {
      return back()->with('msgSuccess', 'Restore successful');
    }
    return back()->with('msgError', 'Restore failed!');
  }

  public function forceDelete($id)
  {
    $check = Post::onlyTrashed()->where('id', $id)->forceDelete();
    if ($check) {
      return back()->with('msgSuccess', 'Delete successful');
    }
    return back()->with('msgError', 'Delete failed!');
  }
}
