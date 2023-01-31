@extends('layouts.front')

@section('content')


    <!-- about_us start -->

    <div class="about_us" style="background-image: url({{ asset('front/foto/Outputs_fon.png') }})">
        <section class="container">
            <div class="about_us__cart">
                <div class="about_us__list">
                    <h2 class="about_us__title__h2">@lang('main.past_events')</h2>

                    <ul class="about_us__menu">
                        <li>
                            <a href="{{ route('events') }}" class="about_us__menu__link">@lang('main.events')</a>
                        </li>

                        <li>
                            <a class="about_us__menu__link">@lang('main.past_events')</a>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
    </div>

    <!-- about_us end -->


    <!-- outputs_in start -->

    <div class="outputs_in">
        <section class="container">
            <div class="outputs_in__cart">

                <aside>

                    <h3 class="history__title__h3">@lang('main.events')</h3>

                    <ul class="history__menu">
                        <li>
                            <a data-eventtype='1' href="{{ route('eventproducts', [1]) }}" class="eventtype-change history__menu__link @if(request('id')=='1') active @endif">@lang('main.upcoming_events')</a>
                        </li>

                        <li>
                            <a data-eventtype='2' href="{{ route('eventproducts', [2]) }}" class="eventtype-change history__menu__link @if(request('id')=='2') active @endif ">@lang('main.past_events')</a>
                        </li>
                    </ul>

                    <form id="filtereventForm" action="#!">
                        @csrf
                        <section class="experts__form__list">
                          <h4 class="experts__title__h4">@lang('main.by_date')</h4>
                           @foreach ($events as $value)
                            <label class="input-wrap">
                                <input type="checkbox" name="dates[]" value="{{ $value }}" class="experts__input__form">
                                <span class="checkmark"></span>
                                <h5 class="experts__title__h5">{{ $value }}</h5>
                            </label>
                            @endforeach


                        </section>
                        @foreach ($centerFilter as $value)
                            <section class="experts__form__list filter_by__centers">
                                <h4 class="experts__title__h4">{{ $value->{'tropic_' . app()->getLocale()}  }}</h4>
                                <div id="regionSection<?= $value->id ?>">
                                    @foreach ($value->abouts() as $item)

                                        <label class="input-wrap">
                                            <input type="checkbox" name="center_id[]" value="{{$item->id}}" class="experts__input__form">
                                            <span class="checkmark"></span>
                                            <h5 class="experts__title__h5">{{ $item->{'title_' . app()->getLocale()} }}</h5>
                                        </label>

                                    @endforeach
                                </div>
                            <a href="#!" data-less="0" data-showMore="@lang('main.show_more')" data-showLess="@lang('main.show_less')"   data-id="<?= $value->id ?>" class="filter_show_more experts__link__from">@lang('main.show_more')<span><i class="fas fa-angle-down"></i></span></a>
                        </section>
                        @endforeach

                    </form>

                </aside>


                <div id="result_event_section">

                <div class="outputs_in__list__cart">


                    <div class="outputs_in__list">
                      @foreach ($past as $eventproduct)
                        <div class="outputs_in__item">
                            <a href="{{ route('eventproduct', $eventproduct->{'slug_' . app()->getLocale()}) }}">
                                <div class="outputs_in__img">
                                    <img src="{{ asset($eventproduct->image) }}" alt="outputs_in">
                                </div>

                                <section>
                                    <div class="outputs__item__cart">
                                        @if($eventproduct->event_date > now())
                                        <h4 class="outputs__title__h4">@lang('main.upcoming_events')</h4>
                                        @else

                                        <h4 class="outputs__title__h4">@lang('main.past_events')</h4>

                                        @endif
                                        <h5 class="outputs__title__h5">{{ $eventproduct->created_at->format('F d, Y') }}</h5>
                                    </div>

                                    <h3 class="outputs__title__h3">{{ $eventproduct->{'title_' . app()->getLocale()} }}</h3>

                                    <div class="outputs__text">
                                        <p>{!! $eventproduct->{'description_' . app()->getLocale()} !!}</p>
                                    </div>
                                </section>
                            </a>
                        </div>
                      @endforeach
                    </div>

                    {{ $upcoming->links("vendor.pagination.pagination")}}

                </div>
            </div>


            </div>
        </section>

    </div>

    <!-- outputs_in end -->

@endsection
@section('pageScripts')
    <!-- flot charts scripts-->
    <script src="{{ asset('front/js/eventfilter.js') }}"></script>
@endsection
