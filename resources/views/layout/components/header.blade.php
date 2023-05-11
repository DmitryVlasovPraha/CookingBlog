<!-- top bar start -->
<section class="top-bar">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 align-self-center md-center-item">
                <div class="ts-temperature">
                </div>

                <ul class="ts-top-nav">
                    @foreach($pages as $page)
                    <li>
                        <a href="{{ route('page', ['page' => $page->slug]) }}">{{$page->name}}</a>
                    </li>
                    @endforeach

                </ul>

            </div>
            <!-- end col-->

            <div class="col-lg-6 text-right align-self-center">
                <ul class="top-social">
                    <li>
                        <a href="#">
                            <i class="fa fa-twitter"></i>
                        </a>
                        <a href="#">
                            <i class="fa fa-youtube"></i>
                        </a>
                        <a href="#">
                            <i class="fa fa-linkedin"></i>
                        </a>
                    </li>

                </ul>
            </div>
            <!--end col -->
        </div>
        <!-- end row -->
    </div>
</section>
<!-- end top bar-->

<!-- header middle -->
<section class="header-middle border-top v4">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 align-self-center">
                <div class="header-logo text-center">
                    <a href="{{route('index')}}">
                        <img src="{{'/img/logo.webp'}}" width="111" length="57" alt="">
                    </a>
                </div>
            </div>
            <!-- col end -->
        </div>
        <!-- row  end -->
    </div>
    <!-- container end -->
</section>


<!-- header nav start-->
<header class="navbar-standerd nav-item">
    <div class="container">
        <div class="row">

            <!-- logo end-->
            <div class="col-lg-12">
                <!--nav top end-->
                <nav class="navigation ts-main-menu navigation-landscape">
                    <div class="nav-header">
                        <a class="nav-brand" href="{{route('index')}}">
                            <!-- <img src="images/footer_logo.png" alt=""> -->
                        </a>
                        <div class="nav-toggle"></div>
                    </div>
                    <!--nav brand end-->

                    <div class="nav-menus-wrapper clearfix">
                        <!--nav right menu start-->
                        <ul class="right-menu align-to-right">

                            <li>
                                <a href="{{route('auth.login')}}">
                                    <i class="fa fa-user-circle-o"></i>
                                </a>
                            </li>

                            <li class="header-search">
                                <div class="nav-search">
                                    <div class="nav-search-button">
                                        <i class="icon icon-search"></i>
                                    </div>
                                    <!--Форма для поиска-->
                                    <form>
                                        <span class="nav-search-close-button" tabindex="0">✕</span>
                                        <div class="nav-search-inner">
                                            <input type="search" name="search" placeholder="Поиск">
                                        </div>
                                    </form>

                                </div>
                            </li>
                        </ul>
                        <!--nav right menu end-->

                        <!-- nav menu start-->
                        <ul class="nav-menu">
                            <li class="">
                                <a href="#">Категории</a>
                                <div class="megamenu-panel ts-mega-menu">
                                    <div class="megamenu-lists">
                                        <ul class="megamenu-list list-col-2">
                                            @foreach($categories as $category)
                                            <li class="">
                                                <a href="{{ route('blog.category', ['category' => $category->slug]) }}">{{$category->name}}</a>
                                            </li>
                                            @endforeach
                                        </ul>

                                    </div>
                                </div>
                            </li>
                            <li>
                                <a href="#">Последнее</a>
                                <div class="megamenu-panel">
                                    <div class="megamenu-tabs">
                                        <ul class="megamenu-tabs-nav">
                                            <li class="active">
                                                <a href="#">Популярное</a>
                                            </li>
                                            <li class="active">
                                                <a href="#">Летние рецепты</a>
                                            </li>
                                        </ul>
                                        <div class="megamenu-tabs-pane active">
                                            <div class="row">
                                                @foreach($posts as $post)
                                                <div class="col-12 col-lg-4">
                                                    <div class="item">
                                                        <div class="ts-post-thumb">
                                                            <a class="post-cat ts-purple-bg" href="#">Health</a>
                                                            <a href="{{ route('blog.post', ['post' => $post->slug]) }}">
                                                                @if($post->image)
                                                                <img class="img-fluid" src="{{('storage/post/image/'.$post->image)}}" alt="">
                                                                @endif
                                                            </a>
                                                        </div>
                                                        <div class="post-content">
                                                            <h3 class="post-title">
                                                                <a href="{{ route('blog.post', ['post' => $post->slug]) }}">{{$post->name}}</a>
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <!-- mega menu end-->
                                        <div class="megamenu-tabs-pane active">
                                            <div class="row">

                                                <div class="col-12 col-lg-4">
                                                    <div class="item">

                                                        <div class="ts-post-thumb">
                                                            <a class="post-cat ts-yellow-bg" href="#">FOOD</a>
                                                            <a href="#">
                                                                <img class="img-fluid" src="images/news/foods/food1.jpg" alt="">
                                                            </a>
                                                        </div>
                                                        <div class="post-content">
                                                            <h3 class="post-title">
                                                                <a href="#">Tourism in Dubai is booming by international tourist</a>
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12 col-lg-4">
                                                    <div class="item">

                                                        <div class="ts-post-thumb">
                                                            <a class="post-cat ts-yellow-bg" href="#">Food</a>
                                                            <a href="#">
                                                                <img class="img-fluid" src="images/news/foods/food2.jpg" alt="">
                                                            </a>
                                                        </div>
                                                        <div class="post-content">
                                                            <h3 class="post-title">
                                                                <a href="#">Tourism in Dubai is booming by international tourist</a>
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg-4">
                                                    <div class="item">

                                                        <div class="ts-post-thumb">
                                                            <a class="post-cat ts-yellow-bg" href="#">Food</a>
                                                            <a href="#">
                                                                <img class="img-fluid" src="images/news/foods/food3.jpg" alt="">
                                                            </a>
                                                        </div>
                                                        <div class="post-content">
                                                            <h3 class="post-title">
                                                                <a href="#">Tourism in Dubai is booming by international tourist</a>
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                        <!-- mega menu end-->

                                    </div>
                                </div>
                            </li>
                            <li>
                                <a href="category-1.html">Авторы на сайте</a>
                            </li>
                            <li>
                                <a href="#">Видео</a>
                                <div class="megamenu-panel">
                                    <div class="row">
                                        <div class="col-12 col-lg-3">
                                            <div class="item">
                                                <div class="ts-post-thumb">
                                                    <a href="">
                                                        <img class="img-fluid" src="images/news/tech/tech1.jpg" alt="">
                                                    </a>
                                                    <a href="https://www.youtube.com/watch?v=uZmz6fGRVW4" class="fa fa-play-circle-o ts-video-icon"></a>
                                                </div>
                                                <div class="post-content">
                                                    <h3 class="post-title">
                                                        <a href="#">Tourism in Dubai tourist favorite place</a>
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-3">
                                            <div class="item">
                                                <div class="ts-post-thumb">
                                                    <a href="">
                                                        <img class="img-fluid" src="images/news/tech/tech2.jpg" alt="">

                                                    </a>
                                                    <a href="https://www.youtube.com/watch?v=uZmz6fGRVW4" class="fa fa-play-circle-o ts-video-icon"></a>

                                                </div>
                                                <div class="post-content">
                                                    <h3 class="post-title">
                                                        <a href="#">Tourism in Dubai tourist favorite place</a>
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-3">
                                            <div class="item">
                                                <div class="ts-post-thumb">
                                                    <a href="">
                                                        <img class="img-fluid" src="images/news/tech/tech3.jpg" alt="">

                                                    </a>
                                                    <a href="https://www.youtube.com/watch?v=uZmz6fGRVW4" class="fa fa-play-circle-o ts-video-icon"></a>

                                                </div>
                                                <div class="post-content">
                                                    <h3 class="post-title">
                                                        <a href="#">Tourism in Dubai tourist favorite place</a>
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-3">
                                            <div class="item">
                                                <div class="ts-post-thumb">
                                                    <a href="">
                                                        <img class="img-fluid" src="images/news/tech/tech4.jpg" alt="">
                                                    </a>
                                                    <a href="https://www.youtube.com/watch?v=uZmz6fGRVW4" class="fa fa-play-circle-o ts-video-icon"></a>
                                                </div>
                                                <div class="post-content">
                                                    <h3 class="post-title">
                                                        <a href="#">Tourism in Dubai tourist favorite place</a>
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a href="category-2.html">Форум</a>
                            </li>
                            <li>
                                <a href="category-2.html">Стать автором</a>
                            </li>

                        </ul>
                        <!--nav menu end-->
                    </div>
                </nav>
                <!-- nav end-->
            </div>
        </div>
    </div>
</header>
