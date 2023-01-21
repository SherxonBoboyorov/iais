@extends('layouts.front')

@section('content')


    <!-- about_us start -->

    <div class="about_us" style="background-image: url({{ asset('front/foto/Support_fon.png') }})">
        <section class="container">
            <div class="about_us__cart">
                <div class="about_us__list">
                    <h2 class="about_us__title__h2">@lang('main.news')</h2>

                    <ul class="about_us__menu">
                        <li>
                            <a href="{{ route('/') }}" class="about_us__menu__link">@lang('main.main')</a>
                        </li>

                        <li>
                            <a class="about_us__menu__link">@lang('main.news')</a>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
    </div>

    <!-- about_us end -->


    <!-- News all start -->

    <div class="news_all">
        <section class="container">
            <div class="news_all__cart">
                <div class="news__list">
                    @foreach ($articles as $article)

                    <div class="news__item">
                        <a href="{{ route('article', $article->{'slug_' . app()->getLocale()}) }}">
                            <div class="news__img">
                                <img src="{{ asset($article->image) }}" alt="news">
                            </div>

                            <h5 class="news__title__h5">{{ $article->created_at->format('F d,Y') }}</h5>

                            <h3 class="news__title__h3">{{ $article->{'title_' . app()->getLocale()} }}</h3>

                            <div class="news__text">
                                <p>{!! $article->{'content_' . app()->getLocale()} !!}</p>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>

                {{ $articles->links("vendor.pagination.pagination")}}

            </div>
        </section>
    </div>

    <!-- News all end -->

@endsection
