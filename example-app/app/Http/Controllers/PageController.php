<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Slider;
use App\Models\User;
use Illuminate\Http\Request;

class PageController extends Controller
{
    //
    public function show() {
        $banner = Slider::all();
        $account = User::all();
        $room = Room::all();

        return view('index', compact('banner', 'account', 'room'));
    }
}
