@extends('layouts.front')

@section('content')

    <!-- about_us start -->

    <div class="about_us" style="background-image: url({{ asset('front/foto/Support_fon.png') }})">
        <section class="container">
            <div class="about_us__cart">
                <div class="about_us__list">
                    {{-- @foreach ($aboutpeople as $aboutperson) --}}

                    <h2 class="about_us__title__h2">{{ $person->aboutperson->{'name_' . app()->getLocale()} }}</h2>

                    <ul class="about_us__menu">

                        <li>
                            <a href="{{ route('about') }}" class="about_us__menu__link">@lang('main.about_us')</a>
                        </li>

                        <li>
                            <a class="about_us__menu__link">{{ $person->aboutperson->{'name_' . app()->getLocale()} }}</a>
                        </li>

                    </ul>
                    {{-- @endforeach --}}

                </div>
            </div>
        </section>
    </div>

    <!-- about_us end -->


    <!-- news start -->
    <div class="experts_in">
        <section class="container">
            <div class="experts_in__cart">


                <div class="experts_in__item__cart clearfix">
                    <div class="experts_in__cart__img">
                        <img src="{{ asset($person->image) }}" alt="experts_in">
                    </div>

                    <section>
                        <h2 class="outputs__title__h2">{{ $person->{'name_' . app()->getLocale()} }}</h2>
                        <div class="experts_in__text">
                        </div>
                    </section>
                </div>


                <div class="experts_in__list">

                    <div class="experts_in__item">
                        <h3 class="history__title__h3"></h3>
                        <div class="experts_in__text">
                            <p>
                                {!! $person->{'content_' . app()->getLocale()} !!}
                           </p>
                        </div>
                    </div>

                </div>



            </div>
        </section>
    </div>


    <!-- news end -->

@endsection
