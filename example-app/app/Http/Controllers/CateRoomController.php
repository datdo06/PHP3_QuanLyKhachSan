<?php

namespace App\Http\Controllers;

use App\Models\CateRoom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use function League\Flysystem\get;

class CateRoomController extends Controller
{
    //
    public function index() {
        $cate = CateRoom::all();

        return view('admin.cateroom.list',  compact('cate'));
    }

    public function add(Request $request) {
        if ($request -> isMethod('POST')) {
            $param = $request->except('_token');

            $cate = CateRoom::create($param);
            if ($cate->id) {
                Session::flash('Success', 'Thêm thành công banner');

                return redirect()->route('list_cate');
            }
        }
        return view('admin.cateroom.add');
    }

    public function update(Request $request, $id) {
        $cate = CateRoom::find($id);

        if($request->isMethod('POST')) {
            $param = $request->except('_token');

            $result = CateRoom::where('id', $id)
                ->update($param);
            if ($result) {
                Session::flash('Success', 'Sửa thành công');
                return redirect()->route('list_cate');
            }
        }

        return view('admin.cateroom.update', compact('cate'));
    }

    public function delete($id) {
        CateRoom::where('id', $id)->delete();
        Session::flash('Success', 'Xóa thành công account có id là ' . $id);

        return redirect()->route('list_cate');
    }
}
