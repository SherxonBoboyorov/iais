@extends('layouts.front')

@section('content')



    <!-- about_us start -->

    <div class="about_us" style="background-image: url({{ asset('front/foto/Projects_fon.png') }})">
        <section class="container">
            <div class="about_us__cart">
                <div class="about_us__list">
                    <h2 class="about_us__title__h2">{{ $eventproduct->{'title_' . app()->getLocale()} }}</h2>

                    <ul class="about_us__menu">

                        <li>
                            <a href="{{ route('events') }}" class="about_us__menu__link">{{ $eventproduct->eventcategory->{'title_' . app()->getLocale()} }}</a>
                        </li>

                        <li>
                            <a class="about_us__menu__link">{{ $eventproduct->{'title_' . app()->getLocale()} }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
    </div>

    <!-- about_us end -->


    <!-- events_in start -->

    <div class="projects_in">
        <section class="container">
            <div class="projects_in__cart">

                <div class="projects_in__cart__videos">
                    <div class="projects_in__videos">
                        <a data-fancybox="video-gallery" href="{{ $eventproduct->frame }}">
                            <img src="{{ asset($eventproduct->image) }}" alt="video"/>
                            <!-- play start -->

                            <div class="button__min is-play" href="#">
                                <div class="button-outer-circle has-scale-animation"></div>
                                <div class="button-outer-circle has-scale-animation has-delay-short"></div>
                                <div class="button-icon is-play">
                                    <img class="about_contint_in__video__img__play" alt="All" src="{{ asset('front/foto/play.svg') }}">
                                </div>
                            </div>

                            <!-- play end -->
                        </a>
                    </div>

                    <h4 class="projects_in__title__h4">{!! $eventproduct->{'description_' . app()->getLocale()} !!}</h4>
                </div>


                <div class="outputs_contint__cart">

                    <aside>
                        <h3 class="history__title__h3">@lang('main.written_by')</h3>

                        <div class="history__leader__item">

                            <div class="history__leader__img">
                                <img src="{{ asset($eventproduct->expertpeople->image) }}" alt="leader">
                            </div>

                            <h3 class="history__leader__name">{{ $eventproduct->expertpeople->{'title_' . app()->getLocale()} }}</h3>

                            <div class="history__leader__text">
                                <p>
                                    {!! $eventproduct->expertpeople->{'content_' . app()->getLocale()} !!}
                                </p>
                            </div>
                            <a href="{{ route('expertpeople', $eventproduct->expertpeople->{'slug_' . app()->getLocale()}) }}" class="centers_in__link">@lang('main.more') <span><i class="fas fa-chevron-right"></i></span></a>
                        </div>


                        <h3 class="outputs_contint__title__h3">@lang('main.contact')</h3>

                        <div class="outputs_contint__text">
                            <p>
                                {!! $eventproduct->expertpeople->{'contact_'. app()->getLocale()} !!}
                            </p>
                        </div>
                    </aside>

                    <div class="outputs_contint__cart__list">
                        <div class="outputs_contint__list">
                            <div class="outputs__item__cart">
                                <h4 class="outputs__title__h4">{{ $eventproduct->eventcategory->{'title_' . app()->getLocale()} }}</h4>
                                <h5 class="outputs__title__h5">{{ $eventproduct->created_at->format('F d, Y') }}</h5>
                            </div>

                            <section class="outputs_contint__list__icons">
                                <h4 class="outputs_contint__title__h4">@lang('main.share')</h4>

                                <ul class="outputs_contint__icons">
                                    <li>
                                        <a href="{{ $options->where('key', 'instagram')->first()->value }}" class="outputs_contint__icons__link"><i class="fab fa-instagram"></i></a>
                                    </li>

                                    <li>
                                        <a href="{{ $options->where('key', 'invision')->first()->value }}" class="outputs_contint__icons__link"><i class="fab fa-invision"></i></a>
                                    </li>

                                    <li>
                                        <a href="{{ $options->where('key', 'youtube')->first()->value }}" class="outputs_contint__icons__link"><i class="fab fa-youtube"></i></a>
                                    </li>
                                </ul>
                            </section>
                        </div>

                        <h2 class="outputs__title__h2">{{ $eventproduct->{'title_' . app()->getLocale()} }}</h2>

                        <div class="history__list__text clearfix">
                            <p>
                                {!! $eventproduct->{'ongoing_content_' . app()->getLocale()} !!}
                            </p>
                        </div>
                    </div>

                </div>

            </div>
        </section>
    </div>

    <!-- events_in end -->


@endsection
