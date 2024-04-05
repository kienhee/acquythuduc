<?php

namespace App\Http\Controllers\Admin\Slider;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index(Request $request)
    {
        $sliders = Slider::where('id', 1)->first();

        return view('admin.slider.index', compact('sliders'));
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'images' => 'required'
        ], [
            'images.required' => 'Vui lòng thêm ảnh!',
        ]);

        // Sử dụng phương thức updateOrCreate để cập nhật hoặc tạo mới bản ghi
        $check = Slider::updateOrCreate(['id' => 1], $validate);

        if ($check) {
            if ($check->wasRecentlyCreated) {
                return back()->with('msgSuccess', 'Tạo mới thành công');
            } else {
                return back()->with('msgSuccess', 'Cập nhật thành công');
            }
        } else {
            return back()->with('msgError', 'Thao tác thất bại!');
        }
    }
}
