@if ($items->where('parent_id', $parent)->count())
    <ul class="category-list">
        @foreach ($items->where('parent_id', $parent) as $item)
            <li>
                <a href="{{ route('blog.category', ['category' => $item->slug]) }}">{{ $item->name }}<span class="ts-orange-bg">10</span></a>
                @include('layout.part.categories', ['parent' => $item->id])
            </li>
        @endforeach
    </ul>
@endif
