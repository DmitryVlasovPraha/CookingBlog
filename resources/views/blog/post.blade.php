@extends('layout.site', ['title' => $post->name])

@section('content')
    <!-- single post start -->
    <section class="single-post-wrapper post-layout-10">
        <div class="container">
            <div class="row mb-30">
                <div class="col-lg-12">

                    <div class="entry-header">

                        @foreach($post->tags as $tag)
                            <a  class="post-cat ts-orange-bg" href="{{ route('blog.tag', ['tag' => $tag->slug]) }}">{{ $tag->name }}</a>
                        @endforeach

                        <a href="#" class="post-cat ts-orange-bg">Еда</a>

                            <a href="#" class="post-cat ts-yellow-bg">Кухня</a>

                        <h2 class="post-title lg">{{ $post->name }}</h2>
                        <ul class="post-meta-info">
                            <li class="author">
                                <a href="{{ route('blog.author', ['user' => $post->user->id]) }}">
                                    <img src="{{'/img/IMG_0654.JPG'}}" alt=""> {{ $post->user->name }}
                                </a>
                            </li>
                            <li>
                                <i class="fa fa-clock-o"></i>
                                {{ $post->created_at }}
                            </li>
                            <li class="active">
                                <i class="el el-fire"></i>
                                3,005
                            </li>
                            <li class="share-post">
                                <a href="#">
                                    <i class="fa fa-share"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- single post header end-->
                    <div class="post-content-area">
                        @if ($post->image)
                            <div class="single-big-img img-ovarlay" style="background-image: url({{ asset('storage/post/image/'.$post->image) }})">
                        @else
                        <div class="single-big-img img-ovarlay" style="background-image: url({{('images/news/travel/travel4.jpg')}})">
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-9">
                    <!-- Вывод ингридиентов-->
                    <div class="author-box">

                        <div class="author-info">
                            <h4 class="author-name">Вам понадобится:</h4>
                            <div class="clearfix"></div>
                                <p>
                                    {!! $post->recipe !!}
                                </p>
                        </div>
                    </div>
                    <div class="ts-grid-box content-wrapper single-post">
                        <div class="post-content-area">
                            <div class="entry-content">
                                <p>
                                    {!! $post->content !!}
                                </p>
                            </div>
                            <!-- entry content end-->
                        </div>
                    </div>
                    <!--single post end -->
                    @include('blog.part.comments', ['comments' => $comments])
                    <!-- comment form end-->
                    <div class="ts-grid-box mb-30">
                        <h2 class="ts-title">Последнее на сайте</h2>

                        <div class="most-populers owl-carousel">

                            @foreach($topics as $topic)
                            <div class="item">
                                <a class="post-cat ts-orange-bg" href="#">Готовка</a>
                                <div class="ts-post-thumb">
                                    <a href="{{ route('blog.post', ['post' => $topic->slug]) }}">
                                        @if($topic->image)
                                        <img class="img-fluid" src="{{ asset('storage/post/image/'.$topic->image) }}" alt="">
                                            @endif
                                    </a>
                                </div>
                                <div class="post-content">
                                    <h3 class="post-title">
                                        <a href="{{ route('blog.post', ['post' => $topic->slug]) }}">{{$topic->name}}</a>
                                    </h3>
                                    <span class="post-date-info">
										<i class="fa fa-clock-o"></i>
										{{$topic->created_at}}
									</span>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
@endsection
