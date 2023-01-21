@extends('layouts.front')

@section('content')

    <!-- about_us start -->

    <div class="about_us" style="background-image: url({{ asset('front/foto/Centers_fon.png') }})">
        <section class="container">
            <div class="about_us__cart">
                <div class="about_us__list">
                    <h2 class="about_us__title__h2">@lang('main.centers')</h2>

                    <ul class="about_us__menu">
                        <li>
                            <a href="{{ route('/') }}" class="about_us__menu__link">@lang('main.main')</a>
                        </li>

                        <li>
                            <a class="about_us__menu__link">@lang('main.centers')</a>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
    </div>

    <!-- about_us end -->


    <!-- Centers start -->

    <div class="centers">
        <section class="container">
            <div class="centers__cart">
                <div class="centers__list">
                    @foreach ($centerabouts as $centerabout)

                    <div class="centers__item">
                        <div class="centers__img">
                            <img src="{{ asset($centerabout->image) }}" alt="centers">
                        </div>

                        <h3 class="centers__title__h3">{{ $centerabout->{'title_' . app()->getLocale()} }}</h3>
                        <a href="{{ route('centerabout', $centerabout->{'slug_' . app()->getLocale()}) }}" class="centers__link">@lang('main.more') <span><i class="fas fa-chevron-right"></i></span></a>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>

    <!-- Centers end -->


 @endsection
