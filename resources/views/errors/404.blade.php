@extends('layout.site', ['title' => 'Страница не найдена'])

@section('content')
    <section class="block-wrapper">
        <div class="container">
            <div class="row">

                <div class="col-lg-12">
                    <div class="error-page text-center col ts-grid-box">
                        <div class="error-code">
                            <h2>
                                <strong>404</strong>
                            </h2>
                        </div>
                        <div class="error-message">
                            <h3>Упс! К сожалению, страница не найдена;(</h3>
                        </div>
                        <div class="error-body">
                            <h4>Возможно, ссылка, которую вы использовали, не работает.</h4>
                            <a href="{{route('index')}}" class="btn btn-primary">На главную</a>
                        </div>
                    </div>
                </div>

            </div>
            <!-- Row end -->


        </div>
        <!-- Container end -->
    </section>
@endsection
