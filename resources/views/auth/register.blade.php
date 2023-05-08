@extends('layout.site', ['title' => 'Регистрация'])

@section('content')
    <!-- post wraper start-->
    <section class="block-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 mx-auto">

                    <div class="ts-grid-box">
                        <div class="reg-page">
                            <h3 class="log-sign-title mb-25">Страница регистрации</h3>

                            <form method="post" action="{{ route('auth.register') }}">
                                @csrf
                                <div class="form-row">
                                    <div class="col form-group">
                                        <label>Ваше имя </label>
                                        <input type="text" class="form-control" name="name" placeholder="Имя, Фамилия"
                                               required maxlength="255" value="{{ old('name') ?? '' }}">
                                    </div> <!-- form-group end.// -->

                                </div> <!-- form-row end.// -->
                                <div class="form-group">
                                    <label>Email </label>
                                    <input type="email" class="form-control" name="email" placeholder="Адрес почты"
                                           required maxlength="255" value="{{ old('email') ?? '' }}">
                                    <small class="form-text text-muted"></small>
                                </div> <!-- form-group end.// -->

                                <div class="form-group">
                                    <label>Пароль</label>
                                    <input class="form-control" type="password"  name="password" placeholder="Придумайте пароль"
                                           required maxlength="255" value="">
                                </div> <!-- form-group end.// -->
                                <div class="form-group">
                                    <label>Подтвердите пароль</label>
                                    <input class="form-control" type="password" name="password_confirmation"
                                           placeholder="Пароль еще раз" required maxlength="255" value="">
                                </div> <!-- form-group end.// -->
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block"> Регистрация  </button>
                                </div> <!-- form-group// -->
                                <small class="text-muted">Нажимая 'регистрация' вы соглашаетесь с политикой нашего сайта</small>
                            </form>

                            <div class="border-top card-body text-center">У Вас есть аккаунт? <a href="{{route('auth.login')}}">Войти</a></div>
                        </div> <!-- card.// -->

                    </div><!-- grid box end -->
                </div>
                <!-- col end-->

            </div>
            <!-- row end-->
        </div>
        <!-- container end-->
    </section>
    <!-- post wraper end-->
@endsection
