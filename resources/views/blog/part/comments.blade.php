

<div class="comments-form ts-grid-box">
@if ($comments->count())
        <h3 class="comments-counter">Комментариев: {{$comments->count()}}</h3>
    @foreach ($comments as $comment)
            <ul class="comments-list">
                <li>
                    <div class="comment">
                        <a href="{{ route('blog.author', ['user' => $post->user->id]) }}">
                        <img class="comment-avatar float-left" alt="" src="{{('/img/avater/author.png')}}">
                        </a>
                        <div class="comment-body">
                            <div class="meta-data"><span class="float-right"><a class="comment-reply" href="#"><i 	class="fa fa-mail-reply-all"></i> </a></span>
                                <span class="comment-author"> {{ $comment->user->name }}</span><span class="comment-date">{{ $comment->created_at }}</span>
                            </div>
                            <div class="comment-content">
                                <p>{{ $comment->content }}</p>
                            </div>
                        </div>
                    </div>
                    <!-- Comments end-->
                    <!-- comments-reply end-->
                </li>
                <!-- Comments-list li end-->
            </ul>
            <!-- Comments-list ul end-->

    @endforeach
    {{ $comments->fragment('comment-list')->links() }}
@else
    <p>К этому посту еще нет комментариев</p>
@endif

    @perm('create-comment')
    @include('blog.part.form')
    @endperm

    Чтобы написать комментарий <a href="{{route('auth.login')}}">авторизируйтесь </a>

</div>
