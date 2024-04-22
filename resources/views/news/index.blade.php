<div>
    News list

    <ul>
        @isset($news)
            @foreach($news as $n)
                <li>[id: {{ $n->id }}] <a href="{{ route('news.show', $n->id) }}">{{ $n->title }}</a>
                    [author: {{ $n->user->name }} [id: {{ $n->user->id }}]]
                    [<a href="{{ route('news.edit', $n->id) }}">Edit</a> ]</li>
            @endforeach

{{--            {{ $news->links() }}--}}

        @endisset
    </ul>
</div>
