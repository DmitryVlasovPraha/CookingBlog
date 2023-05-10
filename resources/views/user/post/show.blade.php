@extends('layout.site', ['title' => $post->name, 'user' => true])

@section('content')
    <!-- single post start -->
    <section class="single-post-wrapper post-layout-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <ol class="breadcrumb">
                        <li>
                            <a href="{{route('index')}}">
                                <i class="fa fa-home"></i>

                            </a>
                        </li>
                        <li>
                            <a href="#"></a>
                        </li>
                        <li></li>
                    </ol>
                    <!-- breadcump end-->
                    <div class="ts-grid-box content-wrapper single-post">

                        <!-- single post header end-->
                        <div class="post-content-area">
                            <div class="post-media post-featured-image">
                                <a href="images/news/travel/travel2.jpg" class="gallery-popup">
                                    @if ($post->image)
                                        <img src="{{ asset('storage/post/image/'.$post->image) }}" alt="" class="img-fluid" />
                                    @else
                                        <img src="http://via.placeholder.com/1000x300" alt="" class="img-fluid">
                                    @endif
                                </a>
                            </div>
                            <p class="text-bg">
                                @if ( ! $post->isVisible())
                                    <i class="far fa-eye-slash text-danger" title="Предварительный просмотр"></i>
                                @else
                                    <i class="far fa-eye text-success" title="Этот пост опубликован"></i>
                                @endif
                                {{ $post->name }}
                            </p>
                            <div class="entry-header">
                                <h2 class="post-title lg">{{$post->name}}</h2>
                                <ul class="post-meta-info">
                                    <li>
                                        <a href="#" class="post-cat ts-orange-bg">Рецепт</a>
                                    </li>
                                    <li class="author">
                                            <a href="{{ route('blog.author', ['user' => $post->user->id]) }}">

                                            <img src="images/avater/author.png" alt=""> {{ $post->user->name }}
                                        </a>
                                    </li>
                                    <li>
                                        <i class="fa fa-clock-o"></i>
                                        {{$post->created_at}}
                                    </li>
                                    <li class="active">
                                        <i class="icon-fire"></i>

                                    </li>

                                </ul>
                            </div>
                            <div class="entry-content">
                                <p>
                                    {!! $post->recipe !!}
                                </p>
                                    </div>
                                </div>
                                <p>
                                    {!! $post->content !!}
                                </p>
                                <p>
                                    <a href="">
                                        <img class="img-fluid" src="images/banner/banner2.jpg" alt="">
                                    </a>
                                </p>
                            </div>
                            <!-- entry content end-->
                        </div>
                </div>

            <span>
                @if ( ! $post->isVisible())
                    <a href="{{ route('user.post.edit', ['post' => $post->id]) }}"
                       class="btn btn-primary" title="Редактировать пост">
                        <i class="far fa-edit"></i>
                    </a>
                    <form action="{{ route('user.post.destroy', ['post' => $post->id]) }}"
                          method="post" class="d-inline" onsubmit="return confirm('Удалить этот пост?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" title="Удалить пост">
                            <i class="far fa-trash-alt"></i>
                        </button>
                    </form>
                @endif
            </span>

            @if ($post->tags->count())
                <div class="card-footer">
                    Теги:
                    @foreach($post->tags as $tag)
                        @php $comma = $loop->last ? '' : ' • ' @endphp
                        <a href="{{ route('blog.tag', ['tag' => $tag->slug]) }}">
                            {{ $tag->name }}</a>
                        {{ $comma }}
                    @endforeach
                </div>
            @endif

                <!-- col end -->
                <div class="col-lg-3">
                    <div class="right-sidebar">
                    </div>
                </div>
                <!-- right sidebar end-->
                <!-- col end-->
            </div>
            <!-- row end-->
        </div>
        <!-- container-->
    </section>
    <!-- single post end-->



@endsection
