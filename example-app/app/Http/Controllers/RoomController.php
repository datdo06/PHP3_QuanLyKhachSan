<?php

namespace App\Http\Controllers;

use App\Http\Requests\SliderRequest;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use function League\Flysystem\get;


class RoomController extends Controller
{
    //
    public function index() {
        $room = Room::all();

        return view('admin.room.list', compact('room'));
    }

    public function add(Request $request) {
        if ($request -> isMethod('POST')) {
            $param = $request->except('_token');

            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $param['image'] = uploadFile('hinh', $request->file('image'));
            }

            $slider = Room::create($param);
            if ($slider->id) {
                Session::flash('Success', 'Thêm thành công banner');

                return redirect()->route('list_room');
            }
        }
        return view('admin.room.add');
    }

    public function update(SliderRequest $request, $id) {
        $room = Room::find($id);

        if($request->isMethod('POST')) {
            $param = $request->except('_token');

            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $resultDl = Storage::delete('/public' . $room->image);
                if ($resultDl) {
                    $param['image'] = uploadFile('hinh', $request->file('image'));
                }
            } else {
                $param['image'] = $room->image;
            }
            $result = Room::where('id', $id)
                ->update($param);
            if ($result) {
                Session::flash('Success', 'Sửa thành công');
                return redirect()->route('list_room');
            }
        }

        return view('admin.room.update', compact('room'));
    }

    public function delete($id) {
        Room::where('id', $id)->delete();
        Session::flash('Success', 'Xóa thành công account có id là ' . $id);

        return redirect()->route('list_room');
    }
}
