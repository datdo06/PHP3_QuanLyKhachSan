<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    //

    public function index() {
        $account = DB::table('users')
            -> select('id', 'name', 'sdt', 'image', 'address', 'date_of_birth', 'email', 'password', 'role_id')
            -> whereNull('deleted_at')
            -> get();

        return view('admin.account.list', compact('account'));
    }

    public function add(UserRequest $request) {
        $title = "Thêm mới account";
        if ($request -> isMethod('POST')) {

            // Nếu như tồn tại file thì sẽ up file lên
            $params = $request->except('_token');
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $params['image'] = uploadFile('hinh', $request->file('image'));
            }
            $account = User::create($params);
            if ($account->id) {
                Session::flash('success', 'Thêm thành công');
                return redirect()->route('list_account');
            }
        }
        return view('admin.account.add', compact('title'));
    }

    public function update(UserRequest $request, $id)
    {
        $title = "Update account";

        $account = User::find($id);

        if ($request->isMethod('POST')) {
            $param = $request->except('_token');

            if ($request->hasFile('image') && $request->file('image')->isValid()) {

                // có file mới upload lên sẽ link vao để xóa ảnh cũ
                $resultDl = Storage::delete('/public' . $account->image);

                if ($resultDl) {
                    $param['image'] = uploadFile('hinh', $request->file('image'));
                }
            } else {
                $param['image'] = $account->image;
            }

            $result = User::where('id', $id)
                ->update($param);

            if ($result) {
                Session::flash('Success', 'Sửa thành công account');
                return redirect()->route('list_account');
            }
        }

        return view('admin.account.update', compact('account', 'title'));
    }

    public function delete($id) {
        User::where('id', $id)->delete();
        Session::flash('Success', 'Xóa thành công account có id là ' . $id);

        return redirect()->route('list_account');
    }
}
