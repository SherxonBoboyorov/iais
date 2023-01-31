@extends('layouts.front')

@section('content')

    <!-- about_us start -->

    <div class="about_us" style="background-image: url({{ asset('front/foto/Projects_fon.png') }})">
        <section class="container">
            <div class="about_us__cart">
                <div class="about_us__list">
                    <h2 class="about_us__title__h2">@lang('main.events')</h2>

                    <ul class="about_us__menu">
                        <li>
                            <a href="{{ route('/') }}" class="about_us__menu__link">@lang('main.main')</a>
                        </li>

                        <li>
                            <a class="about_us__menu__link">@lang('main.events')</a>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
    </div>

    <!-- about_us end -->

    <!-- Events start -->

    <div class="events_in">
        <section class="container">
            <div class="events_in__cart">


                <div class="events_in__list__cart">
                  <h2 class="outputs__title__h2">@lang('main.upcoming_events')</h2>

                    <div class="projects__list">
                        @foreach ($upcoming as $eventproduct)
                        <div class="projects__item">
                            <a href="{{ route('eventproduct', $eventproduct->{'slug_' . app()->getLocale()}) }}">
                                <div class="projects__img">
                                    <img src="{{ asset($eventproduct->image) }}" alt="projects">
                                </div>

                                <h4 class="projects__title__h4">@lang('main.upcoming_events')</h4>
                                <div class="projects__text">
                                    <p>{!! $eventproduct->{'title_' . app()->getLocale()} !!}</p>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>

                    <a href="{{ route('eventproducts', [1]) }}" class="events_in__link">@lang('main.view_all') <span><i class="fas fa-chevron-right"></i></span></a>
                </div>
                <div class="events_in__list__cart">
                    <h2 class="outputs__title__h2">@lang('main.past_events')</h2>

                      <div class="projects__list">
                          @foreach ($past as $eventproduct)
                          <div class="projects__item">
                              <a href="{{ route('eventproduct', $eventproduct->{'slug_' . app()->getLocale()}) }}">
                                  <div class="projects__img">
                                      <img src="{{ asset($eventproduct->image) }}" alt="projects">
                                  </div>

                                  <h4 class="projects__title__h4">@lang('main.past_events')</h4>
                                  <div class="projects__text">
                                      <p>{!! $eventproduct->{'title_' . app()->getLocale()} !!}</p>
                                  </div>
                              </a>
                          </div>
                          @endforeach
                      </div>

                      <a href="{{ route('eventproducts', [2]) }}" class="events_in__link">@lang('main.view_all') <span><i class="fas fa-chevron-right"></i></span></a>
                  </div>

            </div>
        </section>
    </div>

    <!-- Events end -->

@endsection
