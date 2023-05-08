@if ($items->count())

        @foreach($items as $item)
            <li>
                <a href="{{ route('blog.tag', ['tag' => $item->slug]) }}">{{ $item->name }}</a>
            </li>
        @endforeach

@endif
