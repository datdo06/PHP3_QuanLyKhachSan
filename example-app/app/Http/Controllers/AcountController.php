<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccountRequest;
use App\Models\Accounts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use function League\Flysystem\get;

class AcountController extends Controller
{
    //
    public function index() {
        $account = DB::table('accounts')
            -> select('id', 'name', 'sdt', 'image', 'address', 'date_of_birth', 'email', 'password')
            -> get();

        return view('admin.account.index', compact('account'));
    }

    public function add(AccountRequest $request) {
        $title = "Thêm mới account";
        if ($request -> isMethod('POST')) {

            // Nếu như tồn tại file thì sẽ up file lên
            $params = $request->except('_token');
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $params['image'] = uploadFile('hinh', $request->file('image'));
            }
            $account = Accounts::create($params);
            if ($account->id) {
                Session::flash('success', 'Thêm thành công');
                return redirect()->route('list_account');
            }
        }
        return view('admin.account.add', compact('title'));
    }

//    public function update(AccountRequest $request, $id) {
//        $title = "Update account";
//
//        $account = Accounts::find($id);
//        if ($request->isMethod('POST')) {
//            $result = Accounts::where('id', $id)
//                -> update($request -> except('_token'));
//            if ($request->hasFile('image') && $request->file('image')->isValid()) {
//                $result['image'] = uploadFile('hinh', $request->file('image'));
////                $account->save();
//            }
//            if($result) {
//                Session::flash('Success', 'Sửa thành công account');
//                return redirect()->route('list_account');
//            }
//        }
//        return view('admin.account.update', compact('account', 'title'));
//    }

    public function update(AccountRequest $request, $id)
    {
        $title = "Update account";

        $account = Accounts::find($id);


        if ($request->isMethod('POST')) {
            $data = $request->except('_token');

            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $image = uploadFile('hinh', $request->file('image'));
                if ($image) {
                    $data['image'] = $image;
                }
            }

            $result = Accounts::where('id', $id)->update($data);

            if ($result) {
                Session::flash('Success', 'Sửa thành công account');
                return redirect()->route('list_account');
            }
        }

        return view('admin.account.update', compact('account', 'title'));
    }
}
