@extends('layouts.front')

@section('content')


    <!-- about_us start -->

    <div class="about_us" style="background-image: url({{ asset('front/foto/Outputs_fon.png') }})">
        <section class="container">
            <div class="about_us__cart">
                <div class="about_us__list">
                    <h2 class="about_us__title__h2">past events</h2>

                    <ul class="about_us__menu">
                        <li>
                            <a href="{{ route('events') }}" class="about_us__menu__link">@lang('main.events')</a>
                        </li>

                        <li>
                            <a class="about_us__menu__link">past events</a>
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
                        @foreach ($eventcategories as $eventcategory)
                            <li>
                                <a href="{{ route('eventproducts', ['id' => $eventcategory->id])}}" class="history__menu__link @if ($eventcategory->id == $id) active @endif">{{ $eventcategory->{'title_' . app()->getLocale()} }}</a>
                            </li>
                        @endforeach

                    </ul>

                    <form action="#!">

                        <section class="experts__form__list">
                            <h4 class="experts__title__h4">By date</h4>
                            <label class="input-wrap">
                                <input type="checkbox" class="experts__input__form">
                                <span class="checkmark"></span>
                                <h5 class="experts__title__h5">Lorem ipsum</h5>
                            </label>

                            <a href="#!" class="experts__link__from">@lang('main.show_more')<span><i class="fas fa-angle-down"></i></span></a>
                        </section>

                        <section class="experts__form__list">
                            <h4 class="experts__title__h4">by topic</h4>
                            <label class="input-wrap">
                                <input type="checkbox" class="experts__input__form">
                                <span class="checkmark"></span>
                                <h5 class="experts__title__h5">Lorem ipsum</h5>
                            </label>

                            <label class="input-wrap">
                                <input type="checkbox" class="experts__input__form">
                                <span class="checkmark"></span>
                                <h5 class="experts__title__h5">Dolor sit amet</h5>
                            </label>

                            <label class="input-wrap">
                                <input type="checkbox" class="experts__input__form">
                                <span class="checkmark"></span>
                                <h5 class="experts__title__h5">Consectetur adipiscing</h5>
                            </label>

                            <label class="input-wrap">
                                <input type="checkbox" class="experts__input__form">
                                <span class="checkmark"></span>
                                <h5 class="experts__title__h5">Sed do eiusmod</h5>
                            </label>

                            <a href="#!" class="experts__link__from">@lang('main.show_more')<span><i class="fas fa-angle-down"></i></span></a>
                        </section>

                        <section class="experts__form__list">
                            <h4 class="experts__title__h4">by region</h4>
                            <label class="input-wrap">
                                <input type="checkbox" class="experts__input__form">
                                <span class="checkmark"></span>
                                <h5 class="experts__title__h5">Lorem ipsum</h5>
                            </label>

                            <label class="input-wrap">
                                <input type="checkbox" class="experts__input__form">
                                <span class="checkmark"></span>
                                <h5 class="experts__title__h5">Dolor sit amet</h5>
                            </label>

                            <label class="input-wrap">
                                <input type="checkbox" class="experts__input__form">
                                <span class="checkmark"></span>
                                <h5 class="experts__title__h5">Consectetur adipiscing</h5>
                            </label>

                            <label class="input-wrap">
                                <input type="checkbox" class="experts__input__form">
                                <span class="checkmark"></span>
                                <h5 class="experts__title__h5">Sed do eiusmod</h5>
                            </label>

                            <a href="#!" class="experts__link__from">@lang('main.show_more')<span><i class="fas fa-angle-down"></i></span></a>
                        </section>

                    </form>

                </aside>


                <div class="outputs_in__list__cart">


                    <div class="outputs_in__list">
                      @foreach ($eventproducts as $eventproduct)
                        <div class="outputs_in__item">
                            <a href="{{ route('eventproduct', $eventproduct->{'slug_' . app()->getLocale()}) }}">
                                <div class="outputs_in__img">
                                    <img src="{{ asset($eventproduct->image) }}" alt="outputs_in">
                                </div>

                                <section>
                                    <div class="outputs__item__cart">
                                        <h4 class="outputs__title__h4">{{ $eventproduct->eventcategory->{'title_' . app()->getLocale()} }}</h4>
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

                    {{ $eventproducts->links("vendor.pagination.pagination")}}

                </div>

            </div>
        </section>
    </div>

    <!-- outputs_in end -->

@endsection
