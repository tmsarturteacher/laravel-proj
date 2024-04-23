<div>
    News list [<a href="{{route('news.create')}}">Create news</a> ]

    <ul>
        @isset($news)
            @foreach($news as $n)
                <li>[id: {{ $n->id }}] <a href="{{ route('news.show', $n->id) }}">{{ $n->title }}</a>
                    [author:
                    @foreach($n->user as $user)
                        {{ $user->name }}
                    @endforeach
                    ]
                    [<a href="{{ route('news.edit', $n->id) }}">Edit</a> ]</li>
            @endforeach

{{--            {{ $news->links() }}--}}

        @endisset
    </ul>
</div>
