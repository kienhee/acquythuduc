<?php

namespace App\Http\Controllers\Admin\Partner;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class PartnerController extends Controller
{
    public function index()
    {
        $partners = Partner::orderBy('created_at', 'desc')->paginate(15);
        return view('admin.partner.index', compact('partners'));
    }

    public function add()
    {
        return view('admin.partner.add');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|max:50|unique:partners,name',
            'logo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');

            $filename = $file->hashName();
            $path = $file->storePubliclyAs('public/photos/1/partners', $filename);
            $url = Storage::url($path);
            $validate['logo'] = $url;
        }

        $check = Partner::insert($validate);

        if ($check) {
            return back()->with('msgSuccess', 'Added successfully');
        }

        return back()->with('msgError', 'Failed to add!');
    }

    public function edit(Partner $partner)
    {
        return view('admin.partner.edit', compact('partner'));
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'name' => 'required|max:50|unique:partners,name,' . $id,
            'logo' => 'nullable',
        ]);
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');

            $filename = $file->hashName();
            $path = $file->storePubliclyAs('public/photos/1/partners', $filename);
            $url = Storage::url($path);
            $validate['logo'] = $url;
        }

        $check = Partner::where('id', $id)->update($validate);

        if ($check) {
            return back()->with('msgSuccess', 'Updated successfully');
        }

        return back()->with('msgError', 'Failed to update!');
    }

    public function delete($id)
    {
        $check = Partner::destroy($id);

        if ($check) {
            return back()->with('msgSuccess', 'Deleted successfully');
        }

        return back()->with('msgError', 'Failed to delete!');
    }
}
