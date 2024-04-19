<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $result = Product::query();

        if ($request->has('keywords') && $request->keywords != null) {
            $result->where('name', 'like', '%' . $request->keywords . '%');
        }
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
        $totalPost = Product::count();
        $products = $result->paginate(15);

        return view('admin.product.index', compact('products', 'totalPost'));
    }

    public function add()
    {
        return view('admin.product.add');
    }

    public function store(Request $request)
    {
        // dd($request->all());

        $data  = $request->validate([
            'name' => "required|max:255|unique:products,name",
            'slug' => "required|max:255|unique:products,slug",
            'code' => 'required|max:255',
            'category_id' => 'required',
            'partner_id' => 'required',
            'status' => 'required',
            'Origin' => 'required',
            'type' => 'required',
            'warranty' => 'required',
            'size' => 'required',
            'cover' => 'required|image|mimes:jpeg,png,jpg',
            'content' => 'required',
        ]);
        if ($request->hasFile('cover')) {
            $file = $request->file('cover');

            $filename = $file->hashName();
            $path = $file->storePubliclyAs('public/photos/1/products', $filename);
            $url = Storage::url($path);
            $data['cover'] = $url;
        }

        $check = Product::insert($data);

        if ($check) {
            return back()->with('msgSuccess', 'Create successfully');
        }
        return back()->with('msgError', 'Create failed!');
    }

    public function edit(Product $product)
    {
        return view('admin.product.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $data  = $request->validate([
            'name' => "required|max:255|unique:products,name," . $id,
            'slug' => "required|max:255|unique:products,slug," . $id,
            'code' => 'required|max:255',
            'category_id' => 'required',
            'partner_id' => 'required',
            'status' => 'required',
            'type' => 'required',
            'Origin' => 'required',
            'warranty' => 'required',
            'size' => 'required',
            'cover' => 'nullable',
            'content' => 'required',
        ]);
        if ($request->hasFile('cover')) {
            $file = $request->file('cover');

            $filename = $file->hashName();
            $path = $file->storePubliclyAs('public/photos/1/products', $filename);
            $url = Storage::url($path);
            $data['cover'] = $url;
        }
        $check = Product::where(
            'id',
            $id
        )->update($data);
        if ($check) {
            return back()->with('msgSuccess', 'Update  successfully');
        }
        return back()->with('msgError', 'Update  failed!');
    }

    public function softDelete($id)
    {
        $check = Product::destroy($id);
        if ($check) {
            return back()->with('msgSuccess', 'Change status successful');
        }
        return back()->with('msgError', 'Change status failed!');
    }

    public function restore($id)
    {
        $check = Product::onlyTrashed()->where('id', $id)->restore();
        if ($check) {
            return back()->with('msgSuccess', 'Restore successful');
        }
        return back()->with('msgError', 'Restore failed!');
    }

    public function forceDelete($id)
    {
        $check = Product::onlyTrashed()->where('id', $id)->forceDelete();
        if ($check) {
            return back()->with('msgSuccess', 'Delete successful');
        }
        return back()->with('msgError', 'Delete failed!');
    }
}
