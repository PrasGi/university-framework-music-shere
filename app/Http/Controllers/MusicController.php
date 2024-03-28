<?php

namespace App\Http\Controllers;

use App\Http\Helpers\StoreHelper;
use App\Models\Music;
use Illuminate\Http\Request;

class MusicController extends Controller
{
    public function index()
    {
        $datas = Music::paginate(25);
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
}
