<?php

namespace App\Http\Controllers;

use App\Models\WebInfo;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index() {
        $web_title = WebInfo::where("name", "=", "web_title")->first();
        return view("setting/form", ["web_title" => $web_title->value]);
    }

    public function store(Request $request) {
        $web_title = WebInfo::where("name", "=", "web_title")->first();
        $web_title->value = $request->name;
        $web_title->save();

        return redirect()->route('setting.index')->with('success', 'Toko berhasil di update');
    }
}
