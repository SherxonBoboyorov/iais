@extends('layouts.front')

@section('content')

    <!-- about_us start -->

    <div class="about_us" style="background-image: url({{ asset('front/foto/Experts.png') }})">
        <section class="container">
            <div class="about_us__cart">
                <div class="about_us__list">
                    <h2 class="about_us__title__h2">{{ $expertpeople->{'title_' . app()->getLocale()} }}</h2>

                    <ul class="about_us__menu">
                        <li>
                            <a href="{{ route('expertpeoples') }}" class="about_us__menu__link">@lang('main.experts')</a>
                        </li>

                        <li>
                            <a class="about_us__menu__link">{{ $expertpeople->{'title_' . app()->getLocale()} }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
    </div>

    <!-- about_us end -->


    <!-- Experts_in start -->

    <div class="experts_in">
        <section class="container">
            <div class="experts_in__cart">

                <div class="experts_in__item__cart clearfix">
                    <div class="experts_in__cart__img">
                        <img src="{{ asset($expertpeople->image) }}" alt="experts_in">
                    </div>

                    <section>
                        <h2 class="outputs__title__h2">{{ $expertpeople->{'title_' . app()->getLocale()} }}</h2>
                        <div class="experts_in__text">
                            <p>
                                {!! $expertpeople->{'content_' . app()->getLocale()} !!}
                           </p>
                        </div>
                    </section>
                </div>


                <div class="experts_in__list">

                    <div class="experts_in__item">
                        <h3 class="history__title__h3">@lang('main.biography')</h3>
                        <div class="experts_in__text">
                            <p>
                                {!! $expertpeople->{'biography_' . app()->getLocale()} !!}
                           </p>
                        </div>
                    </div>

                    <div class="experts_in__item">
                        <h3 class="history__title__h3">@lang('main.publications')</h3>
                        <div class="experts_in__text">
                            <p>
                                {!! $expertpeople->{'publication_' . app()->getLocale()} !!}
                            </p>
                        </div>
                    </div>

                </div>


                <div class="experts_in__outputs">
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

    <!-- Experts_in end -->

@endsection
