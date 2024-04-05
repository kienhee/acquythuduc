<?php

namespace App\Http\Controllers\Admin\Agency;

use App\Http\Controllers\Controller;
use App\Models\Agency;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AgencyController extends Controller
{
    public function index(Request $request)
    {
        $result = Agency::query();

        if ($request->has('keywords') && $request->keywords != null) {
            $result->where('name', 'like', '%' . $request->keywords . '%');
        }

        if ($request->has('province_id') && $request->province_id != null) {
            $result->where('province_id',  $request->province_id);
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
        $totalAgency = Agency::count();
        $agencies = $result->paginate(15);

        return view('admin.agency.index', compact('agencies'));
    }

    public function add()
    {
        return view('admin.agency.add');
    }

    public function store(Request $request)
    {
        $data  = $request->validate([
            'name' => "required|max:255",
            'address' => "required",
            'phone' => "required",
            'cover' => 'required'
        ]);
        if ($request->hasFile('cover')) {
            $file = $request->file('cover');
            $filename = $file->hashName();
            $path = $file->storePubliclyAs('public/photos/1/agencies', $filename);
            $url = Storage::url($path);
            $data['cover'] = $url;
        }
        $check = Agency::insert($data);

        if ($check) {
            return back()->with('msgSuccess', 'Create successfully');
        }
        return back()->with('msgError', 'Create failed!');
    }

    public function edit(Agency $agency)
    {
        return view('admin.agency.edit', compact('agency'));
    }

    public function update(Request $request, $id)
    {
        $data  = $request->validate([
            'name' => "required|max:255",
            'address' => "required",
            'phone' => "required",
            'cover' => 'required'
        ]);
        if ($request->hasFile('cover')) {
            $file = $request->file('cover');
            $filename = $file->hashName();
            $path = $file->storePubliclyAs('public/photos/1/agencies', $filename);
            $url = Storage::url($path);
            $data['cover'] = $url;
        }
        $check = Agency::where(
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
        $check = Agency::destroy($id);
        if ($check) {
            return back()->with('msgSuccess', 'Change status successful');
        }
        return back()->with('msgError', 'Change status failed!');
    }

    public function restore($id)
    {
        $check = Agency::onlyTrashed()->where('id', $id)->restore();
        if ($check) {
            return back()->with('msgSuccess', 'Restore successful');
        }
        return back()->with('msgError', 'Restore failed!');
    }

    public function forceDelete($id)
    {
        $check = Agency::onlyTrashed()->where('id', $id)->forceDelete();
        if ($check) {
            return back()->with('msgSuccess', 'Delete successful');
        }
        return back()->with('msgError', 'Delete failed!');
    }
}
