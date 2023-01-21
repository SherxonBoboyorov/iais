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
                    @foreach ($expertpeoples as $expertpeople)
                    <h3 class="history__title__h3">@lang('main.written_by')</h3>

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

                    <h3 class="outputs_contint__title__h3">@lang('main.contact')</h3>

                    <div class="outputs_contint__text">
                        <p>
                           {!! $expertpeople->{'contact_' . app()->getLocale()} !!}
                        </p>
                    </div>
                    @endforeach
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
