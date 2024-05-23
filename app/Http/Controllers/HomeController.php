<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function filesystem($request)
    {

//        $request->get('name');
//        $request->file('avatar');

        $request = [
            "test" => "local file system"
        ];

//        Storage::disk('local')->put('example.txt', json_encode($request));
//        $fileData = Storage::get('example.txt');

//        dd(asset('images/example.txt'));

        $isFile = Storage::disk('local')->exists('images/noavatar.png');

        dd($isFile);

        return view('files.index', ['imgUrl' => $image]);
    }
}
