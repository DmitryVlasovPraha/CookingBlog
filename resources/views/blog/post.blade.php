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

                        <a href="#" class="post-cat ts-orange-bg">Travel</a>

                        <a href="#" class="post-cat ts-yellow-bg">Food</a>

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
                    <div class="ts-grid-box content-wrapper single-post">
                        <div class="post-content-area">
                            <div class="entry-content">
                                <p>
                                    {!! $post->content !!}
                                </p>
                            </div>
                            <!-- entry content end-->
                        </div>
                        <!-- post content area-->
                        <div class="author-box">
                            <img class="author-img" src="{{('/img/avater/author.png')}}" alt="">
                            <div class="author-info">
                                <h4 class="author-name">Elina Themen</h4>
                                <div class="authors-social">
                                    <a href="#" class="ts-twitter">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                    <a href="#" class="ts-facebook">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                    <a href="#" class="ts-google-plus">
                                        <i class="fa fa-google-plus"></i>
                                    </a>
                                    <a href="#" class="ts-linkedin">
                                        <i class="fa fa-linkedin"></i>
                                    </a>
                                </div>
                                <div class="clearfix"></div>
                                <p>Black farmers in the US’s South—faced with continued failure in their efforts to run for the successful farms their
                                    launched </p>

                            </div>
                        </div>
                        <!-- author box end-->
                        <div class="post-navigation clearfix">
                            <div class="post-previous float-left">
                                <a href="#">
                                    <img src="{{('/img/news/travel/travel6.jpg')}}" alt="">
                                    <span>Read Previous</span>
                                    <p>
                                        Samsung goes big in India factory ever created
                                    </p>
                                </a>
                            </div>
                            <div class="post-next float-right">
                                <a href="#">
                                    <img src="{{('/img/news/tech/tech5.jpg')}}" alt="">
                                    <span>Read Next</span>
                                    <p>
                                        Samsung goes big in India factory ever created
                                    </p>
                                </a>
                            </div>
                        </div>
                        <!-- post navigation end-->
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
                            <!-- ts-grid-box end-->


                            <!-- ts-grid-box end-->
                        </div>
                        <!-- most-populers end-->
                    </div>
                </div>
                <!-- col end -->
    <!-- single post end-->



@endsection
