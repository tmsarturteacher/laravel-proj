@extends('layout')

@section('content')
    <div>

        <form action="{{route('user.update', $user->id)}}" method="post">
            @csrf
            @method('PUT')
            <label>
                <input name="name" class="form-control" value="{{ $user->name }}">
            </label>
            <label>
                <input name="email" class="form-control" value="{{ $user->email }}">
            </label>
            <label>
                <input name="password" class="form-control" value="{{ $user->password }}">
            </label>
            <button type="submit" class="btn btn-primary mb-3">Edit</button>
        </form>

    </div>
@endsection
