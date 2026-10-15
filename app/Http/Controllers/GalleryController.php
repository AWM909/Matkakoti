<?php

namespace App\Http\Controllers;

use App\Models\Photo;

class GalleryController extends Controller
{
    public function index()
    {
        return view('gallery.index', ['photos' => Photo::latest()->get()]);
    }
}
