<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Eloquent Builder - ORM
        $users = User::paginate(10);

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
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UsersRequest $request)
    {
//        dd($request->validated());
        $user = User::create($request->all());

        if (!$user->save()) {
            redirect()->back()->withErrors('error', 'Error!');
        }

        return redirect()->route('user.index')->with('success', 'User ' . $user->name . ' has been added!');
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

        $editInfo = [
            'name' => $request->get('name'),
            'email' => $request->get('email'),
        ];

        if ($user->password != $request->get('password')) {
            $editInfo['password'] = $request->get('password');
        }

        $user->update($editInfo);

        return redirect(route('user.show', $user->id))->with('success', 'User has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('user.index')->with('success', 'User ' . $user['name'] . ' has been delete!');
    }

    public function list()
    {
        $user = User::all();

        return response()->json($user);
    }
}
