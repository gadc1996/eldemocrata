<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class IndexController extends Controller
{
    public function __invoke():view
    {
        return view('index');
    }
}
