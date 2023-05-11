@extends('layout.site', ['title' => $page->name])

@section('content')


    <section class="block-wrapper mt-15">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="contact-box ts-grid-box">
                        <h3>{{$page->name}}</h3>
                        <p> {!! $page->content !!}</p>

                        <div class="widget contact-info">


                            <div class="contact-info-box">
                                <div class="contact-info-box-content">
                                    <h4>E-mail: </h4>
                                    <p>ring.72.dmitry@yandex.ru</p>
                                </div>
                            </div>
                        </div><!-- Widget end -->

                        <h3></h3>
                    </div><!-- grid box end -->



                </div>
                <!-- col end-->
                <div class="col-lg-3">
                    <div class="right-sidebar">
                        <div class="ts-grid-box widgets">
                            <h2 class="ts-title">Follow us</h2>
                            <ul class="ts-social-list">

                                <li class="ts-twitter">
                                    <a href="#">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                    <label>12.5 k </label>
                                    <span>Follwers</span>
                                </li>
                                <li class="ts-linkedin">
                                    <a href="#">
                                        <i class="fa fa-linkedin"></i>
                                    </a>
                                    <label>12.5 k </label>
                                    <span>Follwers</span>
                                </li>
                                <li class="ts-youtube">
                                    <a href="#">
                                        <i class="fa fa-youtube"></i>
                                    </a>
                                    <label>12.5 k </label>
                                    <span>Follwers</span>
                                </li>
                            </ul>
                        </div>
                        <!-- widgets end-->

                        <div class="widgets widget-banner">
                            <a href="#">
                                <img class="img-fluid" src="images/banner/sidebar-banner2.jpg" alt="">
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
                                    <!--post-content end-->
                                </div>
                                <!--ts-grid-box end -->
                            </div>
                            <!-- tab content end-->
                        </div>
                        <!-- widgets end-->

                    </div>
                    <!-- right sidebar end-->
                </div>
                <!-- col end-->
            </div>
            <!-- row end-->
        </div>
        <!-- container end-->
    </section>
    <!-- post wraper end-->
@endsection
