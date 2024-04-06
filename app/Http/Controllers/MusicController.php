<?php

namespace App\Http\Controllers;

use App\Http\Helpers\StoreHelper;
use App\Models\Music;
use Illuminate\Http\Request;

class MusicController extends Controller
{
    public function index(Request $request)
    {
        $datas = Music::query();

        if ($request->has('search')) {
            $datas = $datas->search($request->search);
        }

        $datas = $datas->paginate(8)->withQueryString();

        return view('pages.music', compact(['datas']));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'title' => 'required',
            'file_music' => 'required|file|max:20000',
            'file_thumbnail' => 'required|mimes:jpeg,jpg,png|max:10000',
            'artist' => 'required',
            'lyrics' => 'nullable',
        ]);

        $validate['file_music'] = StoreHelper::storeFile($request->file('file_music'), 'music');
        $validate['file_thumbnail'] = StoreHelper::storeFile($request->file('file_thumbnail'), 'thumbnail');
        $validate['user_id'] = auth()->user()->id;

        if (Music::create($validate)) {
            return response()->json([
                'status_code' => 200,
                'message' => 'Music added successfully'
            ]);
        } else {
            return response()->json([
                'status_code' => 500,
                'message' => 'Internal server error'
            ]);
        }
    }

    public function addView(Music $music)
    {
        $music->views += 1;
        $music->save();
        return response()->json([
            'status_code' => 200,
            'message' => 'View added successfully'
        ]);
    }

    public function update(Request $request, Music $music)
    {
        $validate = $request->validate([
            'title' => 'required',
            'file_music' => 'nullable|file|max:10000',
            'file_thumbnail' => 'nullable|mimes:jpeg,jpg,png|max:10000',
            'artist' => 'required',
            'lyrics' => 'nullable',
        ]);

        if ($request->hasFile('file_music')) {
            $validate['file_music'] = StoreHelper::storeFile($request->file('file_music'), 'music');
        }

        if ($request->hasFile('file_thumbnail')) {
            $validate['file_thumbnail'] = StoreHelper::storeFile($request->file('file_thumbnail'), 'thumbnail');
        }

        if ($music->update($validate)) {
            return redirect()->back()->with('success', 'Music has been updated');
        } else {
            return redirect()->back()->with('error', 'Internal server error');
        }
    }

    public function destroy(Music $music)
    {
        if ($music->delete()) {
            return redirect()->back()->with('success', 'Music has been deleted');
        } else {
            return redirect()->back()->with('error', 'Internal server error');
        }
    }

    public function download(Music $music)
    {
        // Check apakah file ada
        if ($music->file_music) {
            // Lakukan download file
            $music->downloads = $music->downloads + 1;
            $music->save();
            return response()->download($music->file_music);
        } else {
            // Jika file tidak ditemukan, kembalikan response error 404
            return redirect()->back()->with('error', 'File not found');
        }
    }
}