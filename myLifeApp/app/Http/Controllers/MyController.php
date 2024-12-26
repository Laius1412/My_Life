<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyController extends Controller
{
    public function showView()
    {
        $data = [
            'title' => 'Trang cá nhân của tôi',
            'message' => 'Chào mừng bạn đến với không gian riêng của tôi.'
        ];
        return view('myview', $data);
    }
}
