<?php

namespace App\Http\Controllers\MathJax;
use App\Http\Controllers\Controller;


class TestMathJaxController extends Controller 
{
    public function get_mathjax ()
    {
        return view('mathjax.index');
    }
}