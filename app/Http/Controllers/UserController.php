<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Eloquent Builder - ORM
//        $users = User::all();
//        $users = User::where('id', '>', 1)->orderBy('id')->get();
//        $users = User::paginate(1);
//        $users = User::first();
        $users = User::firstWhere('id', '>', 1);

//        $news = News::first();
//        dd($news->user()->get());


        // Query Builder
//        DB::table('users')
//            ->select('*')
//            ->where('id', '>', 1)
//            ->get();

        $countUsers = User::where('id', '>', 1)->count();

        return view('users.index', [
            'users' => $users,
            'countUsers' => $countUsers
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
//        User::create([])->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);

        return view('users.show', [
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);

        return view('users.edit', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        $user->update([
            'name' => $request->get('name')
        ]);


//        $user->update($request->all());

        return redirect(route('user.show', $user->id));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
