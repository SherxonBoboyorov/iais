@extends('layouts.front')

@section('content')


    <!-- slider start -->

    <div class="slider">
        <div class="slider__list">
          @foreach ($sliders as $slider)
            <div class="slider__item" style="background: linear-gradient(0deg, rgba(0, 51, 77, 0.4), rgba(0, 51, 77, 0.4)), url({{ asset($slider->image) }});">
                <section class="container">
                    <div class="slider__cart">
                        <h1 class="slider__title__h1">{{ $slider->{'title_' . app()->getLocale()} }}</h1>
                        <div class="slider__text">
                            <p>{!! $slider->{'description_' . app()->getLocale()} !!}</p>
                        </div>
                    </div>
                </section>
            </div>
          @endforeach
        </div>
    </div>

    <!-- slider end -->


    <!-- outputs start -->

    <div class="outputs">
        <section class="container">
            <div class="outputs__cart">

                <h2 class="outputs__title__h2">@lang('main.outputs')</h2>

                <div class="outputs__list">
                    @if ($outputnews->count(2) > 0)

                    <div class="outputs__item">
                        <a href="{{ route('outputnew', $outputnews[0]->{'slug_' . app()->getLocale()}) }}">
                            <div class="outputs__img">
                                <img src="{{ asset($outputnews[0]->image) }}" alt="outputs">
                            </div>

                            <div class="outputs__item__cart">
                                <h4 class="outputs__title__h4">{{ $outputnews[0]->outputcategory->{'title_' . app()->getLocale()} }}</h4>


                                <h5 class="outputs__title__h5">{{ $outputnews[0]->created_at->format('F d, Y') }}</h5>
                            </div>

                            <h3 class="outputs__title__h3">{{ $outputnews[0]->{'title_' . app()->getLocale()} }}</h3>

                            <div class="outputs__text">
                                <p>
                                    {{  strip_tags(mb_substr($outputnews[0]->{'content_' . app()->getLocale()}, 0, 538))  }}
                                </p>
                            </div>
                        </a>
                    </div>


                    <div class="outputs__item">
                        <a href="{{ route('outputnew', $outputnews[1]->{'slug_' . app()->getLocale()}) }}">
                            <div class="outputs__img">
                                <img src="{{ asset($outputnews[1]->image) }}" alt="outputs">
                            </div>

                            <div class="outputs__item__cart">
                                <h4 class="outputs__title__h4">{{ $outputnews[1]->outputcategory->{'title_' . app()->getLocale()} }}</h4>
                                <h5 class="outputs__title__h5">{{ $outputnews[1]->created_at->format('F d, Y') }}</h5>
                            </div>

                            <h3 class="outputs__title__h3">{{ $outputnews[1]->{'title_' . app()->getLocale()} }}</h3>

                            <div class="outputs__text">
                                <p>
                                    {{ strip_tags(mb_substr($outputnews[1]->{'content_' . app()->getLocale()}, 0, 538)) }}
                                </p>
                            </div>
                        </a>
                    </div>
                    @endif

                    <ul class="outputs__item__menu">
                        <li>
                            @foreach ($outputnews as $outputnew)
                            <a href="{{ route('outputnew', $outputnew->{'slug_' . app()->getLocale()}) }}">
                                <div class="outputs__item__cart">
                                    <h4 class="outputs__title__h4">{{ $outputnew->outputcategory->{'title_' . app()->getLocale()} }}</h4>
                                    <h5 class="outputs__title__h5">{{ $outputnew->created_at->format('F d, Y') }}</h5>
                                </div>

                                <h3 class="outputs__title__h3">{{ $outputnew->{'title_' . app()->getLocale()} }}</h3>
                            </a>
                        </li>

                        @endforeach
                        <li>
                    </ul>
                </div>
            </div>
        </section>
    </div>

    <!-- outputs end -->


    <!-- Videos sart -->

    <div class="videos">
        <section class="container">
            <div class="videos__cart">
                <h2 class="outputs__title__h2">@lang('main.videos')</h2>
                @if ($videos->count() > 0)

                <div class="videos__list">

                    <div class="videos__cart__item">

                        <a data-fancybox="video-gallery" href="{{ $videos[0]->frame }}">

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

                        <div class="videos__menu__title">
                            <h4>{{ $videos[0]->{'title_' . app()->getLocale()} }}</h4>
                            <img src="{{ asset($videos[0]->image) }}" alt="video"/>
                        </div>

                    </div>

                    <div class="videos__list__menu">
                    @foreach ($videos as $video)

                        <div class="videos__menu__item">
                            <a href="{{ $video->frame }}"></a>
                            <div class="videos__menu__title">
                                <img src="{{ asset($video->image) }}" alt="videos">
                                <h4>{{ $video->{'title_' . app()->getLocale()} }}</h4>
                            </div>
                        </div>

                        @endforeach
                    </div>
                </div>
                @endif
            </div>
        </section>
    </div>

    <!-- Videos end -->


    <!-- Events start -->

    <div class="events">
        <section class="container">
            <div class="events__cart">
                <h2 class="outputs__title__h2">@lang('main.events')</h2>

                <div class="events__list">
                    @if ($eventproducts->count() > 0)

                    <div class="events__list__cart">
                        <a href="{{ route('eventproduct', $eventproducts[0]->{'slug_' . app()->getLocale()}) }}">
                            <div class="events__img__cart">
                                <img src="{{ asset($eventproducts[0]->image) }}" alt="events">
                            </div>

                            <div class="events__item__cart">
                                <h4 class="events__title__h4">{{ $eventproducts[0]->eventcategory->{'title_' . app()->getLocale()} }}</h4>
                                <h5 class="events__title__h5">{{ $eventproducts[0]->created_at->format('F d, Y') }}</h5>
                            </div>

                            <h3 class="events__title__h3">{{ $eventproducts[0]->{'title_' . app()->getLocale()} }}</h3>

                            <div class="events__text">
                                <p>
                                    {!! $eventproducts[0]->{'description_' . app()->getLocale()} !!}
                                </p>
                            </div>
                        </a>
                    </div>

                    <div class="events__list__menu">
                        @foreach ($eventproducts as $eventproduct)

                        <div class="events__item__menu">
                            <a href="{{ route('eventproduct', $eventproduct->{'slug_' . app()->getLocale()}) }}">
                                <div class="events__item__img">
                                    <img src="{{ asset($eventproduct->image) }}" alt="events">
                                </div>

                                <section>
                                    <div class="events__item__cart">
                                        <h4 class="events__title__h4">{{ $eventproduct->eventcategory->{'title_' . app()->getLocale()} }}</h4>
                                        <h5 class="events__title__h5">{{ $eventproduct->created_at->format('F d, Y') }}</h5>
                                    </div>
                                    <h3 class="events__title__h3">{{ $eventproduct->{'title_' . app()->getLocale()} }}</h3>
                                </section>
                            </a>
                        </div>
                      @endforeach
                    </div>
                  @endif
                </div>
            </div>
        </section>
    </div>

    <!-- Events end -->


    <!-- news start -->

    <div class="news">
        <section class="container">
            <div class="news__cart">
                <h2 class="outputs__title__h2">@lang('main.news')</h2>

                <div class="news__list">
                  @foreach ($articles as $article)
                    <div class="news__item">
                        <a href="{{ route('article', $article->{'slug_' . app()->getLocale()}) }}">
                            <div class="news__img">
                                <img src="{{ asset($article->image) }}" alt="news">
                            </div>

                            <h5 class="news__title__h5">{{ $article->created_at->format('F d, Y') }}</h5>

                            <h3 class="news__title__h3">{{ $article->{'title_' . app()->getLocale()} }}</h3>

                            <div class="news__text">
                                <p>{!! $article->{'content_' . app()->getLocale()} !!}</p>
                            </div>
                        </a>
                    </div>
                   @endforeach
                </div>
            </div>
        </section>
    </div>

    <!-- news end -->


    <!-- Subscribe start -->

    @include('alert')

    <div class="subscribe" style="background-image: url({{ asset('front/foto/fon.png') }});">
        <section class="container">
            <div class="subscribe__cart">

                <h2 class="outputs__title__h2">@lang('main.events')</h2>

                <form action="{{ route('yourSave') }}" class="subscribe__form" method="POST">
                    @csrf
                    <input type="email" name="email" placeholder="Your email" class="subscribe__input">
                    <button type="submit" class="subscribe__button">@lang('main.send')<span><i class="fas fa-chevron-right"></i></span></button>
                </form>
            </div>
        </section>
    </div>

    <!-- Subscribe end -->


    @endsection
