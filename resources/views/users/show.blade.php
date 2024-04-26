@extends('layout')

@section('content')

    @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{ session()->get('success') }}
        </div>
    @endif

    <div>
        <h1> User info</h1>

        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">E-mail</th>
                <th scope="col">Name</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">{{ $user->id }}</th>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
