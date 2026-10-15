<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    public function index()
    {
        return view('admin.photos.index', ['photos' => Photo::latest()->get()]);
    }

    public function create()
    {
        return view('admin.photos.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['nullable', 'string', 'max:255'],
            'image' => ['required', 'image', 'max:5120'],
        ]);

        Photo::create([
            'title' => $data['title'] ?? null,
            'path' => $request->file('image')->store('photos', 'public'),
        ]);

        return redirect()->route('admin.photos.index')->with('success', 'Kuva lisätty.');
    }

    public function destroy(Photo $photo)
    {
        Storage::disk('public')->delete($photo->path);
        $photo->delete();

        return redirect()->route('admin.photos.index')->with('success', 'Kuva poistettu.');
    }
}
