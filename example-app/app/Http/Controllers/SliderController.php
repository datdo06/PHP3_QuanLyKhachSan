<?php

namespace App\Http\Controllers;
use App\Http\Requests\SliderRequest;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use function League\Flysystem\get;

class SliderController extends Controller
{
    //
    public function index() {
        $banner = Slider::all();

        return view('admin.banner.list', compact('banner'));
    }

    public function add(SliderRequest $request) {
        if ($request -> isMethod('POST')) {
            $param = $request->except('_token');

            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $param['image'] = uploadFile('hinh', $request->file('image'));
            }

            $slider = Slider::create($param);
            if ($slider->id) {
                Session::flash('Success', 'Thêm thành công banner');

                return redirect()->route('list_banner');
            }
        }
        return view('admin.banner.add');
    }

    public function update(SliderRequest $request, $id) {
        $slider = Slider::find($id);

        if($request->isMethod('POST')) {
            $param = $request->except('_token');

            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $resultDl = Storage::delete('/public' . $slider->image);
                if ($resultDl) {
                    $param['image'] = uploadFile('hinh', $request->file('image'));
                }
            } else {
                $param['image'] = $slider->image;
            }
            $result = Slider::where('id', $id)
                ->update($param);
            if ($result) {
                Session::flash('Success', 'Sửa thành công');
                return redirect()->route('list_banner');
            }
        }

        return view('admin.banner.update', compact('slider'));
    }

    public function delete($id) {
        Slider::where('id', $id)->delete();
        Session::flash('Success', 'Xóa thành công account có id là ' . $id);

        return redirect()->route('list_banner');
    }

}
