@foreach($posts as $post)
    <div class="post-content media">
        @if($post->image)
            <img class="d-flex sidebar-img" src="{{ asset('storage/post/image/'.$post->image) }}" alt="">
        @endif
        <div class="media-body">
            <span class="post-tag">
                <a href="#" class="green-color">Готовка</a></span>
            <h4 class="post-title">
                <a href="{{ route('blog.post', ['post' => $post->slug]) }}">{{$post->name}} </a>
            </h4>
        </div>
    </div>
@endforeach
