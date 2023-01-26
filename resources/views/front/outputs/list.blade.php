@extends('layouts.front')

@section('content')


    <!-- about_us start -->

    <div class="about_us" style="background-image: url({{ asset('front/foto/Outputs_fon.png') }})">
        <section class="container">
            <div class="about_us__cart">
                <div class="about_us__list">
                    <h2 class="about_us__title__h2">@lang('main.outputs')</h2>

                    <ul class="about_us__menu">
                        <li>
                            <a href="{{ route('/') }}" class="about_us__menu__link">@lang('main.main')</a>
                        </li>

                        <li>
                            <a class="about_us__menu__link">@lang('main.outputs')</a>
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
                    <h3 class="history__title__h3">@lang('main.outputs')</h3>

                    <ul class="history__menu">
                        @foreach ($outputcategories as $outputcategory)
                            <li>
                                <a href="{{ route('outputnews', ['id' => $outputcategory->id])}}" class="history__menu__link @if ($outputcategory->id == $id) active @endif">{{ $outputcategory->{'title_' . app()->getLocale()} }}</a>
                            </li>
                        @endforeach
                    </ul>
                    <form id="filterForm" action="#!">
                        @csrf
                        <section class="experts__form__list">
                          <h4 class="experts__title__h4">@lang('main.by_date')</h4>
                           @foreach ($outputs as $value)
                            <label class="input-wrap">
                                <input type="checkbox" name="dates[]" value="{{ $value }}" class="experts__input__form">
                                <span class="checkmark"></span>
                                <h5 class="experts__title__h5">{{ $value }}</h5>
                            </label>
                            @endforeach

                            {{-- <a href="#!" class="experts__link__from">@lang('main.show_more')<span><i class="fas fa-angle-down"></i></span></a> --}}

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

                <div id="result_section">
                    <div class="outputs_in__list__cart">

                        <div class="outputs_in__list">
                            @foreach ($outputnews as $outputnew)
                            <div class="outputs_in__item">
                                <a href="{{ route('outputnew', $outputnew->{'slug_' . app()->getLocale()}) }}">
                                    <div class="outputs_in__img">
                                        <img src="{{ asset($outputnew->image) }}" alt="outputs_in">
                                    </div>

                                    <section>
                                        <div class="outputs__item__cart">
                                            <h4 class="outputs__title__h4">{{ $outputnew->outputcategory->{'title_' . app()->getLocale()} }}</h4>
                                            <h5 class="outputs__title__h5">{{ $outputnew->created_at->format('F d, Y') }}</h5>
                                        </div>

                                        <h3 class="outputs__title__h3">{{ $outputnew->{'title_' . app()->getLocale()} }}</h3>

                                        <div class="outputs__text">
                                            <p>{!! $outputnew->{'content_' . app()->getLocale()} !!}</p>
                                        </div>
                                    </section>
                                </a>
                            </div>
                            @endforeach

                        </div>

                        {{ $outputnews->links("vendor.pagination.pagination")}}
                    </div>
                </div>

            </div>
        </section>
    </div>

@endsection
@section('pageScripts')
    <!-- flot charts scripts-->
    <script src="{{ asset('front/js/filter.js') }}"></script>
@endsection
