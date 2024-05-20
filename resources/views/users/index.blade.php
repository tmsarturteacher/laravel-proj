@extends('layout')

{{--@include('partials.header', ["title" => "test"])--}}

@section('content')

    @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{ session()->get('success') }}
        </div>
    @endif

    <h2>Users</h2>
    <a href="{{ route('user.create') }}">
        <button type="button" class="btn btn-primary">Create user</button>
    </a>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Options</th>
        </tr>
        </thead>
        <tbody>
        @isset($users)
            @foreach($users as $user)
                <tr>
                    <th>{{ $user->id }}</th>
                    <th><a href="{{ route('user.show', $user->id) }}">{{ $user->name }}</a></th>
                    <th><a href="{{ route('user.edit', $user->id) }}">
                            <button type="button" class="btn btn-warning">Edit</button>
                        </a>
                        <form method="post" action="{{ route('user.destroy', $user->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>

                    </th>
                </tr>
            @endforeach

{{--            {{ $users->links() }}--}}

        @endisset

        </tbody>
    </table>
@endsection
