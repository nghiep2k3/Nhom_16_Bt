<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloWorldController extends Controller
{
    // Thêm phương thức show nếu chưa có
    public function show()
    {
        return view('helloworld');
    }
}
