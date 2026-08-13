<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index()
    {
        return view('frontend.catalog.index');
    }

    public function show($slug = null)
    {
        return view('frontend.catalog.show');
    }
}
