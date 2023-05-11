@extends('layout.site', ['title' => $category->name])

@section('content')
    <!-- block post area start-->
    <section class="block-wrapper mt-15">
        <div class="container">
            <div class="row mb-30">
                <div class="col-lg-12">
                    <div class="ts-grid-box entry-header">
                        <ol class="ts-breadcrumb">
                            <li>
                                <a href="{{route('index')}}">
                                    <i class="fa fa-home"></i>
                                    На главную
                                </a>
                            </li>
                            <li>
                                <a href="#">Категория</a>
                            </li>

                        </ol>
                        <div class="clearfix entry-cat-header">
                            <h2 class="ts-title float-left">{{$category->name}}</h2>
                            <ul class="ts-category-list float-right">
                                <li>
                                    <a href="#" class="ts-blue-bg"></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-9">
                    <div class="row">

                        @foreach ($posts as $post)
                            @include('blog.part.post', ['post' => $post])
                        @endforeach
                    </div>
                    <div class="ts-pagination text-center mb-20">
                        {{$posts->links()}}
                    </div>
                </div>


                <div class="col-lg-3">
                    <div class="right-sidebar">
                        <div class="ts-grid-box widgets social-widget">
                            <h2 class="widget-title">Наши соц сети</h2>
                            <ul class="ts-social-list">

                                <li class="ts-twitter">
                                    <a href="#">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                    <b>12.5 k </b>
                                    <span>Follwers</span>
                                </li>
                                <li class="ts-linkedin">
                                    <a href="#">
                                        <i class="fa fa-linkedin"></i>
                                    </a>
                                    <b>12.5 k </b>
                                    <span>Follwers</span>
                                </li>
                                <li class="ts-youtube">
                                    <a href="#">
                                        <i class="fa fa-youtube"></i>
                                    </a>
                                    <b>12.5 k </b>
                                    <span>Follwers</span>
                                </li>
                            </ul>
                        </div>
                        <!-- widgets end-->

                        <div class="widgets widget-banner">
                            <a href="#">
                                <img class="img-fluid" src="images/banner/sidebar-banner4.jpg" alt="">
                            </a>
                        </div>
                        <!-- widgets end-->
                        <div class="post-list-item widgets">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation">
                                    <a class="active" href="#home" aria-controls="home" role="tab" data-toggle="tab">
                                        <i class="fa fa-clock-o"></i>
                                        Последнее
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
                                </div>
                                <!--ts-grid-box end -->
                            </div>
                            <!-- tab content end-->
                        </div>
                        <!-- widgets end-->
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
            </div>

            <!-- row end-->
        </div>
        <!-- container end-->
    </section>
    <!-- block area end-->
@endsection
