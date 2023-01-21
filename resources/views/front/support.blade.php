@extends('layouts.front')

@section('content')



    <!-- about_us start -->

    <div class="about_us" style="background-image: url({{ asset('front/foto/Support_fon.png') }})">
        <section class="container">
            <div class="about_us__cart">
                <div class="about_us__list">
                    <h2 class="about_us__title__h2">@lang('main.support')</h2>

                    <ul class="about_us__menu">
                        <li>
                            <a href="{{  route('/')  }}}" class="about_us__menu__link">@lang('main.main')</a>
                        </li>

                        <li>
                            <a class="about_us__menu__link">@lang('main.support')</a>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
    </div>

    <!-- about_us end -->



    <!-- History start -->

    <div class="history">
        <section class="container">
            <div class="history__cart">

                <aside>
                    <h3 class="history__title__h3">@lang('main.support')</h3>

                    <ul class="history__menu">
                        <li>
                            <a href="{{ route('support') }}" class="history__menu__link active">@lang('main.our_donors')</a>
                        </li>

                        <li>
                            <a href="{{ route('donate') }}" class="history__menu__link">@lang('main.donate')</a>
                        </li>
                    </ul>
                </aside>

                <div class="history__list">
                  @foreach ($supportabouts as $supportabout)

                    <h2 class="outputs__title__h2">{{ $supportabout->{'title_' . app()->getLocale()} }}</h2>

                    <div class="history__list__text clearfix">
                        <p>
                            {!! $supportabout->{'content_' . app()->getLocale()} !!}
                       </p>
                    </div>

                    @endforeach
                </div>

            </div>
        </section>
    </div>

    <!-- History end -->

@endsection
