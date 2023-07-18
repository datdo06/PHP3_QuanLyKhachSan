<?php

namespace App\Http\Controllers;

use App\Http\Requests\KhachHangRequest;
use App\Models\KhachHang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use function League\Flysystem\get;

class KhachHangController extends Controller
{
    //
    public function index() {
        $account = DB::table('accounts')
            -> select('id_khachhang', 'name', 'cmnd', 'gender', 'address', 'date_of_birth', 'description')
            -> get();

        return view('admin.accountaccount.index', compact('account'));
    }

    public function add(KhachHangRequest $request) {
        if ($request -> isMethod('POST')) {
            $khachang = KhachHang::create($request->except('_token'));
            if ($khachang->id) {
                Session::flash('success', 'Thêm thành công');
                return redirect()->route('route_khachhang_add');
            }
        }
        return view('admin.account.add');
    }
}
