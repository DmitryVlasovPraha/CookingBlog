<div class="col-lg-6 mb-30">
    <div class="ts-grid-box ts-grid-content">
        <a class="post-cat ts-green-bg" href="#">Sports</a>
        <div class="ts-post-thumb">
            <a href="{{ route('blog.post', ['post' => $post->slug]) }}">
                @if ($post->image)
                    <img src="{{ asset('storage/post/image/'.$post->image) }}" alt="" class="img-fluid" />
                @else
                    <img src="http://via.placeholder.com/1000x300" alt="" class="img-fluid">
                @endif
            </a>
        </div>
        <div class="post-content">
            <h3 class="post-title md">
                <a href="{{ route('blog.post', ['post' => $post->slug]) }}">{{ $post->name }}</a>
            </h3>
            <ul class="post-meta-info">
                <li>
                    <a href="{{ route('blog.author', ['user' => $post->user->id]) }}">
                        {{$post->user->name}}
                    </a>
                </li>
                <li>
                    <i class="fa fa-clock-o"></i>
                    {{$post->created_at}}
                </li>
            </ul>
            <p>{{ $post->excerpt }}</p>
        </div>
    </div>
</div>
