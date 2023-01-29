@extends('layouts.front')

@section('content')

    <!-- about_us start -->

    <div class="about_us" style="background-image: url({{ asset('front/foto/Outputs_fon.png') }})">
        <section class="container">
            <div class="about_us__cart">
                <div class="about_us__list">
                    <h2 class="about_us__title__h2">{{ $outputnew->{'title_' . app()->getLocale()} }}</h2>

                    <ul class="about_us__menu">

                        <li>
                            <a href="{{ route('outputnews', ['id' => 6]) }}" class="about_us__menu__link">@lang('main.outputs')</a>
                        </li>

                        <li>
                            <a class="about_us__menu__link">{{ $outputnew->{'title_' . app()->getLocale()} }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
    </div>

    <!-- about_us end -->


    <!-- outputs_contint start -->

    <div class="outputs_contint">
        <section class="container">
            <div class="outputs_contint__cart">

                <aside>
                    <h3 class="history__title__h3">@lang('main.written_by')</h3>

                    <div class="history__leader__item">

                        <div class="history__leader__img">
                            <img src="{{ asset($outputnew->expertpeople->image) }}" alt="leader">
                        </div>

                        <h3 class="history__leader__name">{{ $outputnew->expertpeople->{'title_' . app()->getLocale()} }}</h3>

                        <div class="history__leader__text">
                            <p>
                                {!! $outputnew->expertpeople->{'content_' . app()->getLocale()} !!}
                            </p>
                        </div>
                        <a href="{{ route('expertpeople', $outputnew->expertpeople->{'slug_' . app()->getLocale()}) }}" class="centers_in__link">@lang('main.more') <span><i class="fas fa-chevron-right"></i></span></a>
                    </div>

                    <h3 class="outputs_contint__title__h3">@lang('main.contact')</h3>

                    <div class="outputs_contint__text">
                        <p>
                           {!! $outputnew->expertpeople->{'contact_' . app()->getLocale()} !!}
                        </p>
                    </div>
                </aside>

                <div class="outputs_contint__cart__list">
                    <div class="outputs_contint__list">
                        <div class="outputs__item__cart">
                            <h4 class="outputs__title__h4">{{ $outputnew->outputcategory->{'title_' . app()->getLocale()} }}</h4>
                            <h5 class="outputs__title__h5">{{ $outputnew->created_at->format('F d, Y') }}</h5>
                        </div>

                        <section class="outputs_contint__list__icons">
                            <h4 class="outputs_contint__title__h4">@lang('main.share')</h4>

                            <ul class="outputs_contint__icons">
                                <li>
                                    <a href="http://twitter.com/share?text=Im Sharing on Twitter&url={!! request()->url() !!}" class="outputs_contint__icons__link"><i class="fab fa-facebook"></i></a>
                                </li>

                                <li>
                                    <a href="https://www.facebook.com/sharer/sharer.php?u={!! request()->url() !!}" class="outputs_contint__icons__link"><i class="fab fa-facebook"></i></a>
                                </li>

                                <li>
                                    <a href="https://www.linkedin.com/shareArticle?mini=true&url={!! request()->url() !!}&title={!!  $outputnew->{'title_' . app()->getLocale()}  !!}" class="outputs_contint__icons__link"><i class="fab fa-linkedin"></i></a>
                                </li>

                                <li>
                                    <a href="https://t.me/share/url?url={!! request()->url() !!}" class="outputs_contint__icons__link"><i class="fab fa-telegram"></i></a>
                                </li>
                            </ul>
                        </section>
                    </div>

                    <h2 class="outputs__title__h2">{{ $outputnew->{'title_' . app()->getLocale()} }}</h2>

                    <div class="history__list__text clearfix">
                        <p>
                            {!! $outputnew->{'content_' . app()->getLocale()} !!}
                        </p>
                    </div>
                </div>

            </div>
        </section>
    </div>

    <!-- outputs_contint end -->


   @endsection
