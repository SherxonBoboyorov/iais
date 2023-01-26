@extends('layouts.front')

@section('content')

    <!-- about_us start -->

    <div class="about_us" style="background-image: url({{ asset('front/foto/Centers_fon.png') }})">
        <section class="container">
            <div class="about_us__cart">
                <div class="about_us__list">
                    <h2 class="about_us__title__h2">{{ $centerabout->{'title_' . app()->getLocale()} }}</h2>

                    <ul class="about_us__menu">
                        <li>
                            <a href="{{ route('centerabouts') }}" class="about_us__menu__link">@lang('main.centers')</a>
                        </li>

                        <li>
                            <a class="about_us__menu__link">{{ $centerabout->{'title_' . app()->getLocale()} }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
    </div>

    <!-- about_us end -->


    <!-- Centers_in start -->

    <div class="centers_in">
        <section class="container">
            <div class="centers_in__cart">
                <h2 class="outputs__title__h2">{{ $centerabout->{'title_' . app()->getLocale()} }}</h2>

                <div class="history__list__text clearfix">
                    <p>
                        {!! $centerabout->{'description_' . app()->getLocale()} !!}
                   </p>
                </div>
            @if(isset($director->director)&!empty($director->director))
                <div class="history__leader__cart">
                    <h2 class="outputs__title__h2">@lang('main.director_of_center')</h2>

                    <div class="centers_in__list">
                      <div class="centers_in__cart__item">
                        <div class="centers_in__list__item">
                            <div class="centers_in__list__img">
                                <img src="{{ asset($director->director->image) }}" alt="Director">
                            </div>

                            <section>
                                <h3 class="history__title__h3">{{ $director->director->{'director_name_' . app()->getLocale()} }}</h3>

                                <ul class="centers_in__contacts">
                                    <li>
                                        <h5 class="centers_in__contacts__text">@lang('main.job_title'):</h5>
                                        <a class="centers_in__contacts__link">{{ $director->director->{'job_title_' . app()->getLocale()} }}</a>
                                    </li>

                                    <li>
                                        <h5 class="centers_in__contacts__text">@lang('main.phone_number'):</h5>
                                        <a href="tel:{{ $director->director->phone_number }}" class="centers_in__contacts__link">{{ $director->director->phone_number }}</a>
                                    </li>

                                    <li>
                                        <h5 class="centers_in__contacts__text">@lang('main.reception_days'):</h5>
                                        <a class="centers_in__contacts__link">{{ $director->director->{'reception_days_' . app()->getLocale()} }}</a>
                                    </li>

                                    <li>
                                        <h5 class="centers_in__contacts__text">@lang('main.email'):</h5>
                                        <a href="mailto:{{ $director->director->email }}" class="centers_in__contacts__link">{{ $director->director->email }}</a>
                                    </li>
                                </ul>

                                <a class="centers_in__link__cart">@lang('main.more')<span><i class="fas fa-chevron-right"></i></span></a>
                            </section>
                        </div>

                        <section class="centers_in__cart__text">
                            <h2 class="outputs__title__h2">@lang('main.center_for_sustainable')</h2>
                            <div class="history__list__text clearfix">
                                <p>
                                    {!! $director->director->{'center_for_sustianable_' . app()->getLocale()} !!}
                                </p>
                            </div>
                            <h2 class="outputs__title__h2">@lang('main.development')</h2>
                            <div class="history__list__text clearfix">
                                <p>
                                    {!! $director->director->{'development_' . app()->getLocale()} !!}
                                </p>
                            </div>
                        </section>
                    </div>
                </div>
            @endif             

                <div class="history__leader__cart">
                    <h2 class="outputs__title__h2">@lang('main.experts')</h2>

                    <div class="centers_in__list__cart">
                        @foreach ($expertpeoples as $expertpeople)


                        <div class="history__leader__item">
                                <div class="history__leader__img">
                                    <img src="{{ asset($expertpeople->image) }}" alt="leader">
                                </div>

                                <h3 class="history__leader__name">{{ $expertpeople->{'title_' . app()->getLocale()} }}</h3>

                                <div class="history__leader__text">
                                    <p>
                                        {!! $expertpeople->{'content_' . app()->getLocale()} !!}
                                    </p>
                                </div>
                                <a href="{{ route('expertpeople', $expertpeople->{'slug_' . app()->getLocale()}) }}" class="centers_in__link">@lang('main.more') <span><i class="fas fa-chevron-right"></i></span></a>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="history__leader__cart">
                    <h2 class="outputs__title__h2">@lang('main.outputs')</h2>

                    <div class="outputs__list">
                        @foreach ($outputnews as $outputnew)

                        <div class="outputs__item">
                            <a href="{{ route('outputnew', $outputnew->{'slug_' . app()->getLocale()}) }}">
                                <div class="outputs__img">
                                    <img src="{{ asset($outputnew->image) }}" alt="outputs">
                                </div>

                                <div class="outputs__item__cart">
                                    <h4 class="outputs__title__h4">{{ $outputnew->outputcategory->{'title_' . app()->getLocale()} }}</h4>
                                    <h5 class="outputs__title__h5">{{ $outputnew->created_at->format('F d,Y') }}</h5>
                                </div>

                                <h3 class="outputs__title__h3">{{ $outputnew->{'title_' . app()->getLocale()} }}</h3>

                                <div class="outputs__text">
                                    <p>{!! $outputnew->{'content_' . app()->getLocale()} !!}</p>
                                </div>
                            </a>
                        </div>
                       @endforeach
                    </div>
                </div>
            </div>

        </section>
    </div>

    <!-- Centers_in end -->
@endsection
