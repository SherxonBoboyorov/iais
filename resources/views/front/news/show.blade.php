@extends('layouts.front')

@section('content')

    <!-- about_us start -->

    <div class="about_us" style="background-image: url({{ asset('front/foto/Support_fon.png') }})">
        <section class="container">
            <div class="about_us__cart">
                <div class="about_us__list">
                    <h2 class="about_us__title__h2">{{ $article->{'title_' . app()->getLocale()} }}</h2>

                    <ul class="about_us__menu">

                        <li>
                            <a href="{{ route('articles') }}" class="about_us__menu__link">@lang('main.news')</a>
                        </li>

                        <li>
                            <a class="about_us__menu__link">{{ $article->{'title_' . app()->getLocale()} }}</a>
                        </li>

                    </ul>
                </div>
            </div>
        </section>
    </div>

    <!-- about_us end -->


    <!-- news start -->

    <div class="news_in">
        <section class="container">
            <div class="news_in__cart">

                <h2 class="outputs__title__h2">{{ $article->{'title_' . app()->getLocale()} }}</h2>

                <div class="news_in__img">
                    <img src="{{ asset($article->image) }}" alt="news_in">
                </div>


                <div class="history__list__text clearfix">
                    <p>
                        {!! $article->{'content_' . app()->getLocale()} !!}
                  </p>

                </div>
            </div>
        </section>
    </div>

    <!-- news end -->

@endsection
