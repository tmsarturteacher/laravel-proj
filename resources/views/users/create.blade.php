@extends('layout')

@section('content')
    <div>

        <form action="{{route('user.store')}}" method="post">
            @csrf
            <div class="mb-3">
            <label>Name
                <input name="name" class="form-control" value="{{ old('name') }}">
            </label>
            </div>
            <div class="mb-3">
            <label>E-mail
                <input name="email" class="form-control" value="{{ old('email') }}">
            </label>
            </div>
            <div class="mb-3">
            <label>Password
                <input name="password" class="form-control" value="{{ old('password') }}">
            </label>
            </div>
            <button type="submit" class="btn btn-primary mb-3">Edit</button>
        </form>

    </div>
@endsection
