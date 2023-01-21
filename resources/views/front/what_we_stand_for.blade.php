@extends('layouts.front')

@section('content')


    <!-- about_us start -->

    <div class="about_us" style="background-image: url({{ asset('front/foto/about_us.png') }})">
        <section class="container">
            <div class="about_us__cart">
                <div class="about_us__list">
                    <h2 class="about_us__title__h2">@lang('main.about_us')</h2>

                    <ul class="about_us__menu">
                        <li>
                            <a href="{{ route('/') }}}" class="about_us__menu__link">@lang('main.main')</a>
                        </li>

                        <li>
                            <a class="about_us__menu__link">@lang('main.about_us')</a>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
    </div>

    <!-- about_us end -->


    <!-- History start -->

    <div class="history">
        <section class="container">
            <div class="history__cart">

                <aside>
                    <h3 class="history__title__h3">@lang('main.about_us')</h3>

                    <ul class="history__menu">
                        <li>
                            <a href="{{ route('about') }}" class="history__menu__link">@lang('main.who_we_are')</a>
                        </li>

                        <li>
                            <a href="{{ route('aboutwhats') }}" class="history__menu__link">@lang('main.what_we_do')</a>
                        </li>

                        <li>
                            <a href="{{ route('aboutmissions') }}" class="history__menu__link active">@lang('main.what_we_stand_for')</a>
                        </li>

                        <li>
                            <a href="{{ route('careers') }}" class="history__menu__link">@lang('main.careers_and_internships')</a>
                        </li>
                    </ul>
                </aside>

                <div class="history__list">
                    @foreach ($aboutmissions as $aboutmission)
                    <div class="history__list__float">
                        <h2 class="outputs__title__h2">{{ $aboutmission->{'title_' . app()->getLocale()} }}</h2>
                        <div class="history__item__float clearfix">
                            <div class="history__text__float">
                                <p>
                                    {!! $aboutmission->{'content_' . app()->getLocale()} !!}
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>

    <!-- History end -->

@endsection
