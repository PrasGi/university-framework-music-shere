<?php

namespace App\Http\Controllers;

use App\Models\Music;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $dataLatest = Music::latest()->paginate(8);
        $dataPopuler = DB::table('music')->orderBy('views', 'desc')->paginate(8);

        $datas = null;

        if ($request->has('search')) {
            $datas = Music::search($request->search)->paginate(12)->withQueryString();
        }

        return view('dashboard', compact(['datas', 'dataLatest', 'dataPopuler']));
    }
}
