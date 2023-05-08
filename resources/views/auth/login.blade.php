@extends('layout.site', ['title' => 'Вход в личный кабинет'])

@section('content')
    <!-- post wraper start-->
    <section class="block-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 mx-auto">
                    <div class="ts-grid-box">
                        <div class="login-page">
                            <h3 class="log-sign-title text-center mb-25">Пожалуйста, введите данные или <a href="{{route('auth.register')}}">зарегистрируйтесь</a></h3>

                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <a href="#" class="btn btn-lg btn-primary btn-fb btn-block">Facebook</a>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <a href="#" class="btn btn-lg btn-info btn-block">Google</a>
                                </div>
                            </div><!-- row end -->
                            <div class="login-or">
                                <hr class="hr-or">
                                <span class="span-or">or</span>
                            </div>

                            <form role="form"  method="post" action="{{ route('auth.auth') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="inputUsernameEmail">Email</label>
                                    <input type="email" class="form-control" name="email" placeholder="Адрес почты"
                                           required maxlength="255" value="{{ old('email') ?? '' }}" id="inputUsernameEmail">
                                </div>
                                <div class="form-group">
                                    <a class="pull-right" href="{{ route('auth.forgot-form') }}">Forgot password?</a>
                                    <label for="inputPassword">Пароль</label>
                                    <input type="password" class="form-control" name="password" placeholder="Ваш пароль"
                                           required maxlength="255" value=""  id="inputPassword">
                                </div>
                                <div class="checkbox pull-right">
                                    <label>
                                        <input type="checkbox" class="form-check-input" name="remember" id="remember">
                                        Запомнить меня </label>
                                </div>
                                <button type="submit" class="btn btn btn-primary">
                                    Войти
                                </button>
                            </form>
                        </div>
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
