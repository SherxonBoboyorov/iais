@extends('layouts.front')

@section('content')


    <!-- about_us start -->

    <div class="about_us" style="background-image: url({{ asset('front/foto/Experts.png') }})">
        <section class="container">
            <div class="about_us__cart">
                <div class="about_us__list">
                    <h2 class="about_us__title__h2">@lang('main.experts')</h2>

                    <ul class="about_us__menu">
                        <li>
                            <a href="{{ route('/') }}" class="about_us__menu__link">@lang('main.main')</a>
                        </li>

                        <li>
                            <a class="about_us__menu__link">@lang('main.experts')</a>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
    </div>

    <!-- about_us end -->


    <!-- Experts start -->

    <div class="experts">
        <section class="container">
            <div class="experts__cart">
                @if ($expertpeoples->count() > 0)

                <aside>
                    <h3 class="history__title__h3">@lang('main.search_experts')</h3>

                    <form action="{{ route('front_search') }}" class="experts__form" method="POST">
                        @csrf
                        <input type="text" class="experts__input" name="phrase" >
                        <button type="submit" class="experts__button"><i class="fas fa-search"></i></button>
                    </form>

                    <form id="filterExpertForm" action="#!">
                        @csrf
                        @foreach ($centerFilter as $value)
            
                        <section  class="experts__form__list">
                            <h4 class="experts__title__h4">{{ $value->{'tropic_' . app()->getLocale()}  }}</h4>
                            <div id="regionSection<?= $value->id ?>">

                                @foreach ($value->abouts() as $item)
                                    <label class="input-wrap">
                                        <input type="checkbox" name="center_id[]" value="{{ $item->id }}" class="experts__input__form">
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

                <div id="resultExpertSection">
                    <div class="experts__cart__list">

                        <div class="history__leader__list">
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

                        {{ $expertpeoples->links("vendor.pagination.pagination")}}
                    </div>
                </div>

                @endif

            </div>
        </section>
    </div>

    <!-- Experts end -->


@endsection
@section('pageScripts')
    <!-- flot charts scripts-->
    <script src="{{ asset('front/js/expertfilter.js') }}"></script>
@endsection
