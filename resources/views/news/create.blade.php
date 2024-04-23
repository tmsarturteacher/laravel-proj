<div>

    @if($errors->any())
        @foreach($errors->all() as $error)
            <div style="color: red"> {{ $error }}</div>
        @endforeach
    @endif

    <form method="post" action="{{route('news.store')}}">
        @csrf
        <label>
            <input type="text" name="title" value="{{ old('title') }}">
        </label>
        <label>
            <textarea name="article">{{ old('article') }}</textarea>
        </label>
        <label>
            <select name="user_id">
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </label>
        <input type="submit" value="Create news">
    </form>
</div>
