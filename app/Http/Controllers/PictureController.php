<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use App\Models\Picture;

class PictureController extends Controller
{
    public function create()
    {
        return view('create_picture');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $file = $request->file('file');
        $name = $request->name;

        // Tambahkan titik sebelum ekstensi file
        $path = time() . '_' . $request->name . '.' . $file->getClientOriginalExtension();

        // Simpan file ke storage
        Storage::disk('local')->put('public/' . $path, file_get_contents($file));

        // Simpan data ke database
        Picture::create([
            'name' => $name,
            'path' => $path
        ]);

        return Redirect::route('picture.create')->with('success', 'Picture successfully uploaded');
    }

    public function show(Picture $picture)
    {
        $url = Storage::url($picture->path);
        return view('show_picture', compact('url', 'picture'));
    }

    public function delete(Picture $picture)
    {
        Storage::delete('public/' . $picture->path);
        $picture->delete();
        return Redirect::route('picture.create');
    }

    public function copy(Picture $picture)
    {
        Storage::copy('public/' . $picture->path, 'copy/' . $picture->path);
        return Redirect::route('picture.create');

    }
    public function move(Picture $picture)
    {
        Storage::move('public/' . $picture->path, 'move/' . $picture->path);
        return Redirect::route('picture.create');

    }
}
