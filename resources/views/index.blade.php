@extends('layout.site')

@section('content')
    <section class="block-wrapper mt-15">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 pr-0">
                    <div class="ts-overlay-style featured-post featured-post-style">
                        <div class="item" style="background-image:url({{('img/news/travel/travel3.jpg')}})">
                            <a class="post-cat ts-orange-bg" href="#">Travel</a>
                            <div class="overlay-post-content">
                                <div class="post-content">

                                    <h2 class="post-title lg">
                                        <a href="#">Clothing and Accessories for the Fashionable Crypto Trader</a>
                                    </h2>
                                    <ul class="post-meta-info">
                                        <li>
                                            <i class="fa fa-clock-o"></i>
                                            March 21, 2019</li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-comments"> </i> Comments</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!--/ Featured post end -->
                        </div>
                    </div>
                    <!-- ts overlay end-->
                </div>
                <!-- col end-->
                <div class="col-lg-4 ts-grid-style-3 featured-post p-1">
                    <div class="ts-overlay-style ">
                        <div class="item" style="background-image: url({{('img/news/fashion/fashion5.jpg')}});">
                            <a class="post-cat ts-pink-bg" href="#">Fashion</a>
                            <div class="overlay-post-content">
                                <div class="post-content">

                                    <h3 class="post-title md">
                                        <a href="#">20 More Crypto Adoption Cases Throughout the World</a>
                                    </h3>
                                    <span class="post-date-info">
										<i class="fa fa-clock-o"></i>
										March 21, 2019
									</span>
                                </div>
                            </div>
                        </div>
                        <!-- end item-->
                    </div>
                    <!-- ts overly end-->
                    <div class="ts-overlay-style">
                        <div class="item" style="background-image: url({{('img/news/sports/sports2.jpg')}});">
                            <a class="post-cat ts-green-bg" href="#">Sports</a>
                            <div class="overlay-post-content">
                                <div class="post-content">

                                    <h3 class="post-title md">
                                        <a href="#">Sports And Altcoins Signaling Bearish Continuation</a>
                                    </h3>
                                    <span class="post-date-info">
										<i class="fa fa-clock-o"></i>
										March 21, 2019
									</span>
                                </div>
                            </div>
                        </div>
                        <!-- end item-->
                    </div>
                    <!-- ts overly end-->
                </div>
            </div>
        </div>
        <!-- container end-->
    </section>
    <!-- block area end-->


    <!-- post wraper start-->
    <section class="block-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="ts-grid-box most-populer-item">
                        <h2 class="ts-title">Популярные категории</h2>

                        <div class="most-populers owl-carousel">

                            @foreach($categories as $category)
                            <div class="item">
                                <a class="post-cat ts-orange-bg" href="#"></a>
                                <div class="ts-post-thumb">
                                    <a href="{{ route('blog.category', ['category' => $category->slug]) }}">
                                        @if ($category->image)
                                            <img src="{{ asset('storage/category/image/'.$category->image) }}" alt="" class="img-fluid" />
                                        @else
                                            <img src="http://via.placeholder.com/1000x300" alt="" class="img-fluid">
                                        @endif
                                    </a>
                                </div>
                                <div class="post-content">
                                    <h3 class="post-title">
                                        <a href="{{ route('blog.category', ['category' => $category->slug]) }}">{{$category->name}}</a>
                                    </h3>
                                    <span class="post-date-info">
										<i class="fa fa-clock-o"></i>
										{{$category->created_at}}
									</span>
                                </div>
                            </div>
                            <!-- ts-grid-box end-->
                            @endforeach

                        </div>
                        <!-- most-populers end-->
                    </div>
                    <!-- ts-populer-post-box end-->
                    <div class="ts-grid-box watch-post mb-30">
                        <h2 class="ts-title">Смотреть сейчас</h2>
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="tab-content featured-post" id="nav-tabContent">
                                    <div class="tab-pane ts-overlay-style fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                        <div class="item" style="background-image: url({{('img/news/travel/travel2.jpg')}})">

                                            <a class="post-cat ts-orange-bg" href="#">TRAVEL</a>
                                            <a href="https://www.youtube.com/watch?v=_0UO1NcheAE" class="ts-video-btn">
                                                <i class="fa fa-play-circle-o"></i>
                                            </a>
                                            <div class="overlay-post-content">
                                                <div class="post-content">
                                                    <h3 class="post-title md">
                                                        <a href="#">They’re back! Kennedy Darling, LeCras named to return</a>
                                                    </h3>
                                                    <ul class="post-meta-info">
                                                        <li class="author">
                                                            <a href="#">
                                                                <img src="{{('img/avater/author1.jpg')}}" alt=""> Donald Ramos
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <i class="fa fa-clock-o"></i>
                                                            March 21, 2019
                                                        </li>
                                                        <li class="active">
                                                            <i class="icon-fire"></i>
                                                            3,005
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- overlay post content-->
                                        </div>
                                        <!-- item end-->
                                    </div>
                                    <!--tab-pane ts-overlay-style end-->
                                    <div class="tab-pane ts-overlay-style fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                        <div class="item" style="background-image: url({{('img/news/health/health2.jpg')}})">

                                            <a class="post-cat ts-purple-bg" href="#">Health</a>
                                            <a href="https://www.youtube.com/watch?v=_0UO1NcheAE" class="ts-video-btn">
                                                <i class="fa fa-play-circle-o"></i>
                                            </a>
                                            <div class="overlay-post-content">
                                                <div class="post-content">
                                                    <h3 class="post-title md">
                                                        <a href="#">retro prawn cocktail – straight from the 80’s!</a>
                                                    </h3>
                                                    <ul class="post-meta-info">
                                                        <li class="author">
                                                            <a href="#">
                                                                <img src="{{('img/avater/author1.jpg')}}" alt=""> Donald Ramos
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <i class="fa fa-clock-o"></i>
                                                            March 21, 2019
                                                        </li>
                                                        <li class="active">
                                                            <i class="icon-fire"></i>
                                                            3,005
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- overlay post content-->
                                        </div>
                                        <!-- item end-->
                                    </div>
                                    <!--tab-pane ts-overlay-style end-->
                                    <div class="tab-pane ts-overlay-style fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                        <div class="item" style="background-image: url({{('img/news/fashion/fashion1.jpg')}})">
                                            <a class="post-cat ts-pink-bg" href="#">Fashion</a>
                                            <a href="https://www.youtube.com/watch?v=_0UO1NcheAE" class="ts-video-btn">
                                                <i class="fa fa-play-circle-o"></i>
                                            </a>
                                            <div class="overlay-post-content">
                                                <div class="post-content">
                                                    <h3 class="post-title md">
                                                        <a href="#">10 critical points from Zuckerberg’s epic security manifesto</a>
                                                    </h3>
                                                    <ul class="post-meta-info">
                                                        <li class="author">
                                                            <a href="#">
                                                                <img src="{{('img/avater/author1.jpg')}}" alt=""> Donald Ramos
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <i class="fa fa-clock-o"></i>
                                                            March 21, 2019
                                                        </li>
                                                        <li class="active">
                                                            <i class="icon-fire"></i>
                                                            3,005
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- overlay post content-->
                                        </div>
                                        <!-- item end-->
                                    </div>
                                    <!--tab-pane ts-overlay-style end-->
                                </div>

                            </div>
                            <!-- col end-->

                            <div class="col-lg-5">
                                <div class="nav post-list-box" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home"
                                       aria-selected="true">
                                        <div class="post-content media">
                                            <img class="d-flex" src="{{('img/news/travel/travel2.jpg')}}" alt="">
                                            <div class="media-body align-self-center">
                                                <h4 class="post-title">
                                                    Tesla just lost its head of global finance
                                                </h4>
                                                <span class="post-date-info">
													<i class="fa fa-clock-o"></i>
													March 21, 2019
												</span>
                                            </div>
                                        </div>
                                    </a>
                                    <!-- nav item end-->
                                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile"
                                       aria-selected="false">
                                        <div class="post-content media">
                                            <img class="d-flex" src="{{('img/news/health/health2.jpg')}}" alt="">
                                            <div class="media-body align-self-center">
                                                <h4 class="post-title">
                                                    Beats did announce something, after all

                                                </h4>
                                                <span class="post-date-info">
													<i class="fa fa-clock-o"></i>
													March 21, 2019
												</span>
                                            </div>
                                        </div>
                                    </a>
                                    <!-- nav item end-->
                                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact"
                                       aria-selected="false">
                                        <div class="post-content media">
                                            <img class="d-flex" src="{{('img/news/fashion/fashion1.jpg')}}" alt="">
                                            <div class="media-body align-self-center">
                                                <h4 class="post-title">
                                                    Tourism in Dubai boom tourist favorite place
                                                </h4>
                                                <span class="post-date-info">
													<i class="fa fa-clock-o"></i>
													March 21, 2019
												</span>
                                            </div>
                                        </div>
                                    </a>
                                    <!-- nav item end-->
                                </div>
                                <!-- watch list post end-->
                            </div>
                            <!-- col end -->
                        </div>
                        <!-- row end-->
                    </div>
                    <div class="ts-grid-box category-box-item-3">
                        <h2 class="ts-title float-left">Рецепты месяца</h2>
                        <a href="#" class="view-all-link float-right">Смотреть все</a>
                        <div class="clearfix"></div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="item">
                                    <div class="ts-post-thumb">
                                        <a class="post-cat ts-orange-bg" href="#">Travel</a>
                                        <a href="#">
                                            <img class="img-fluid" src="{{('img/news/travel/travel8.jpg')}}" alt="">
                                        </a>
                                    </div>
                                    <div class="post-content">
                                        <h3 class="post-title md">
                                            <a href="#">They are backed up Kennedy Darling and Cras named to return</a>
                                        </h3>
                                        <ul class="post-meta-info">
                                            <li class="author">
                                                <a href="#">
                                                    <img src="{{('img/avater/author1.jpg')}}" alt=""> Donald
                                                </a>
                                            </li>
                                            <li>
                                                <i class="fa fa-clock-o"></i>
                                                Jun 21, 2019
                                            </li>
                                            <li class="active">
                                                <i class="icon-fire"></i>
                                                305
                                            </li>
                                        </ul>
                                        <p>
                                            Black farmers in the USA is South faced with the most continued failure in their efforts to run
                                        </p>
                                    </div>
                                </div>
                                <!-- ts-grid-box end-->
                            </div>
                            <!-- col end-->
                            <div class="col-lg-6">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="item mb-20">
                                            <div class="ts-post-thumb">
                                                <a href="#">
                                                    <img class="img-fluid" src="{{('img/news/fashion/fashion1.jpg')}}" alt="">
                                                </a>
                                            </div>
                                            <div class="post-content">
                                                <h3 class="post-title">
                                                    <a href="#">Tourism Dubai booming international tourist</a>
                                                </h3>
                                                <span class="post-date-info">
													<i class="fa fa-clock-o"></i>
													March 21, 2019
												</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col end-->
                                    <div class="col-lg-6">
                                        <div class="item mb-20">
                                            <div class="ts-post-thumb">
                                                <a href="#">
                                                    <img class="img-fluid" src="{{('img/news/tech/tech3.jpg')}}" alt="">
                                                </a>
                                            </div>
                                            <div class="post-content">
                                                <h3 class="post-title">
                                                    <a href="#">Youth vaping an 'epidemic'; crackdown</a>
                                                </h3>
                                                <span class="post-date-info">
													<i class="fa fa-clock-o"></i>
													March 21, 2019
												</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col end-->
                                    <div class="col-lg-6">
                                        <div class="item">
                                            <div class="ts-post-thumb">
                                                <a href="#">
                                                    <img class="img-fluid" src="{{('img/news/tech/tech1.jpg')}}" alt="">
                                                </a>
                                            </div>
                                            <div class="post-content">
                                                <h3 class="post-title">
                                                    <a href="#">How to get the most when selling your iPhone</a>
                                                </h3>
                                                <span class="post-date-info">
													<i class="fa fa-clock-o"></i>
													March 21, 2019
												</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col end-->
                                    <div class="col-lg-6">
                                        <div class="item">
                                            <div class="ts-post-thumb">
                                                <a href="#">
                                                    <img class="img-fluid" src="{{('img/news/travel/travel1.jpg')}}" alt="">
                                                </a>
                                            </div>
                                            <div class="post-content">
                                                <h3 class="post-title">
                                                    <a href="#">Beats did announce something, after all</a>
                                                </h3>
                                                <span class="post-date-info">
													<i class="fa fa-clock-o"></i>
													March 21, 2019
												</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col end-->
                                </div>
                            </div>
                        </div>
                        <!-- row end-->

                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="right-sidebar">
                        <div class="ts-grid-box widgets ts-social-list-item">
                            <h3 class="ts-title">Соцсети</h3>
                            <ul>

                                <li class="ts-twitter">
                                    <a href="#">
                                        <i class="fa fa-twitter"></i>
                                        <b>12.5 k </b>
                                        <span>Follwers</span>
                                    </a>
                                </li>

                                <li class="ts-linkedin">
                                    <a href="#">
                                        <i class="fa fa-linkedin"></i>
                                        <b>5.5 k </b>
                                        <span>Follwers</span>
                                    </a>
                                </li>
                                <li class="ts-youtube">
                                    <a href="#">
                                        <i class="fa fa-youtube"></i>
                                        <b>5.5 k </b>
                                        <span>Follwers</span>
                                    </a>
                                </li>


                            </ul>
                        </div>
                        <!-- widgets end-->

                        <div class="widgets ts-grid-box  widgets-populer-post">
                            <h3 class="widget-title">Самые популярные посты</h3>
                            <div class="ts-overlay-style">
                                <div class="item">
                                    <div class="ts-post-thumb">
                                        <a href="#">
                                            <img class="img-fluid" src="{{('img/news/tech/tech3.jpg')}}" alt="">
                                        </a>
                                    </div>
                                    <div class="overlay-post-content">
                                        <div class="post-content">
                                            <h3 class="post-title">
                                                <a href="#">Tourism in Dubai is boom international tourist</a>
                                            </h3>
                                            <ul class="post-meta-info">
                                                <li>
                                                    <i class="fa fa-clock-o"></i>
                                                    March 21, 2019
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ts-overlay-style  end-->


                            <!-- post content end-->
                        </div>
                        <div class="ts-grid-box widgets category-list-item">
                            <h2 class="widget-title">Категории</h2>
                            @include('layout.part.categories', ['parent' => 0])
                        </div>
                        <div class="widgets widgets-item ts-social-list-item">

                            <div class="ts-widget-newsletter">
                                <div class="newsletter-introtext">
                                    <h4>Newsletter</h4>
                                    <p>Subscribe to get the best stories into your inbox!</p>
                                </div>

                                <div class="newsletter-form">
                                    <form action="#" method="post">
                                        <div class="form-group">
                                            <input type="email" name="email" id="newsletter-form-email" class="form-control form-control-lg" placeholder="E-mail" autocomplete="off">
                                            <button class="btn btn-primary">Subscribe</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- col end-->
            </div>
            <!-- row end-->
        </div>
        <!-- container end-->
    </section>
    <!-- post wraper end-->
    <section class="block-wrapper mb-30" id="more-news-section">
        <div class="container">
            <div class="ts-grid-box ts-grid-box-heighlight">
                <h2 class="ts-title">Авторы на сайте</h2>

                <div class="owl-carousel" id="more-news-slider">


                    @foreach($users as $user)
                    <div class="ts-overlay-style">
                        <div class="item">
                            <div class="ts-post-thumb">
                                <a href="#">
                                    <img class="img-fluid" src="{{('img/news/sports/sports4.jpg')}}" alt="">
                                </a>
                            </div>
                            <a class="post-cat ts-green-bg" href="">Admin</a>
                            <div class="overlay-post-content">
                                <div class="post-content">
                                    <h3 class="post-title">
                                        <a href="http://127.0.0.1:8000/blog/author/11">{{$user->name}}</a>
                                    </h3>
                                    <span class="post-date-info">
										<i class="fa fa-clock-o"></i>
										На сайте с: 23.05.2023
									</span>
                                </div>
                            </div>
                        </div>
                        <!-- end item-->
                    </div>
                    @endforeach

                        </div>
                        <!-- end item-->
                    </div>
                    <!-- ts-overlay-style end-->
                </div>
                <!-- most-populers end-->

            <!-- ts-populer-post-box end-->

        <!-- container end-->
    </section>
    <!-- post wraper end-->
    <section class="block-wrapper mt-15 xs-mb-30">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="ts-grid-box clearfix ts-category-title">
                        <h2 class="ts-title float-left">Публикации на сайте</h2>
                    </div>

                    <div class="row post-col-list-item">

                        @foreach($posts as $post)
                        <div class="col-lg-6 mb-30">
                            <div class="ts-grid-box ts-grid-content">
                                <a class="post-cat ts-green-bg" href="#">Готовка</a>
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
                                        <a href="{{ route('blog.post', ['post' => $post->slug]) }}">{{$post->name}}</a>
                                    </h3>
                                    <ul class="post-meta-info">
                                        <li class="author-name">
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
                        @endforeach
                        {{$posts->links()}}
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="right-sidebar">
                        <div class="widgets widget-banner">
                            <a href="#">
                                <img class="img-fluid" src="{{('img/banner/sidebar-banner4.jpg')}}" alt="">
                            </a>
                        </div>
                        <!-- widgets end-->
                        <div class="post-list-item widgets">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation">
                                    <a class="active" href="#home" aria-controls="home" role="tab" data-toggle="tab">
                                        <i class="fa fa-clock-o"></i>
                                        Последние
                                    </a>
                                </li>

                                <li role="presentation">
                                    <a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">
                                        <i class="fa fa-heart"></i>
                                        Популярное
                                    </a>
                                </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active ts-grid-box post-tab-list" id="home">
                                    @include('blog.components.latest-posts')
                                </div>
                                <!--ts-grid-box end -->
                                <div role="tabpanel" class="tab-pane ts-grid-box post-tab-list" id="profile">
                                    <!--post-content end-->
                                </div>

                                <!--ts-grid-box end -->
                            </div>
                            <!-- tab content end-->
                        </div>
                        <!-- widgets end-->

                        <div class="ts-grid-box widgets tag-list">
                            <h3 class="widget-title">Тэги</h3>
                            <ul>
                                @include('layout.part.popular-tags')
                            </ul>
                        </div>
                        <div class="widgets widget-banner">
                            <a href="#">
                                <img src="{{('img/banner/sidebar-banner1.jpg')}}" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- row end-->
        </div>
        <!-- container end-->
    </section>
    <!-- Block wraper end-->
@endsection
