<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsRequest;
use App\Models\News;
use App\Models\User;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $newsList = [];
        $usersList = [];
        $news = News::all();


//        foreach ($news as $n) {
//            foreach ($n->user as $users) {
//
//                if ($usersList[$n->id]) {
//                    $usersList[$n->id] = $usersList[$n->id] . ', ' . $users;
//                } else {
//                    $usersList[$n->id] = $users;
//                }
//            }
//        }

        return view('news.index', [
            'news' => $news
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();

        return view('news.create', [
            'users' => $users
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NewsRequest $request)
    {
        $validated = $request->validated();

        $news = News::create([
            'title' => $validated['title'],
            'article' => $validated['article'],
            'user_id' => $validated['user_id'],
        ]);

        if (!$news->save()) {
            dd("Error!");
        }

        return redirect()->route('news.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $news = NewsController::findOrFail($id);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(NewsRequest $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
