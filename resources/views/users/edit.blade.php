<div>

    <form action="{{route('user.update', $user->id)}}" method="post">
        @csrf
        @method('PUT')
        <label>
            <input name="name" value="{{ $user->name }}">
        </label>
        <input type="submit">Edit</form>
    </form>

</div>
