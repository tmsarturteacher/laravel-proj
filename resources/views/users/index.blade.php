<div>
    Users list

    <ul>
    @isset($users)
        @foreach($users as $user)
            <li>[id: {{ $user->id }}] <a href="{{ route('user.show', $user->id) }}">{{ $user->name }}</a>
                [{{ $user->user()->name }}]
                [<a href="{{ route('user.edit', $user->id) }}">Edit</a> ]</li>
        @endforeach

        {{ $users->links() }}

    @endisset
    </ul>
</div>
