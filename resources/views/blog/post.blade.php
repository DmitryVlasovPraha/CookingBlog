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
                            </li>
                            <li class="active">
                                <i class="fa-regular fa-heart"></i>
                                {{ number_format($rating, 1, '.', '') }}
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


                        <div class="ts-grid-box mb-30">
                            <h4 class="author-name">Поставьте, пожалуйста, оценку этому рецепту:</h4>
                            <div class="clearfix"></div>
                            <form role="form" class="ts-form" method="post" action="{{ route('blog.review', ['post' => $post->id]) }}">
                                @csrf
                                <input type="hidden" name="post_id" value="{{ $post->id }}">
                                <div class="rating-area">
                                    <input type="radio" id="star-5" name="rating" value="5">
                                    <label for="star-5" title="Оценка «5»"></label>
                                    <input type="radio" id="star-4" name="rating" value="4">
                                    <label for="star-4" title="Оценка «4»"></label>
                                    <input type="radio" id="star-3" name="rating" value="3">
                                    <label for="star-3" title="Оценка «3»"></label>
                                    <input type="radio" id="star-2" name="rating" value="2">
                                    <label for="star-2" title="Оценка «2»"></label>
                                    <input type="radio" id="star-1" name="rating" value="1">
                                    <label for="star-1" title="Оценка «1»"></label>
                                </div>
                                <!-- Form row end -->
                                <div class="clearfix">
                                    <button class="comments-btn btn btn-primary" type="submit">Добавить</button>
                                </div>
                            </form>

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
