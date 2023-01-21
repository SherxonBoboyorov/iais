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

            </div>
        </div>
    </section>
</div>

<!-- outputs_in end -->

@endsection
