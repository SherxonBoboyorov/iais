<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('front/foto/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('front/foto/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('front/foto/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('front/foto/favicon/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('front/foto/favicon/safari-pinned-tab.svg') }}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{ asset('front/css/index.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/fancybox-main.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/slick.css') }}">
    <title>Iais</title>

    {!! Meta::toHtml() !!}

</head>
<body>

    <!-- header start -->

    <header>
        <div class="header">
            <section class="container">
                <div class="header__cart">
                    <div class="header__top">
                        <a href="#modal1"  class="header__top__search modal-trigger">
                            <span><i class="fas fa-search"></i></span> @lang('main.search')
                        </a>

                        <div class="header__top__logo">
                            <a href="{{ route('/') }}">
                                <img src="{{ asset('front/foto/logo.svg') }}" alt="logo">
                            </a>
                        </div>

                        <ul class="header__top__ru">
                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            <li>
                               <a rel="alternate"class="header__ru__link" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                 {{ $properties['native'] }}
                              </a>
                          </li>
                         @endforeach
                        </ul>

                        <button class="header__burger__none sidenav-trigger" data-target="slide-out"><i class="fas fa-bars"></i></button>
                    </div>

                    <div class="header__bottom">
                        <ul class="header__bottom__menu sidenav" id="slide-out">
                            <li>
                                <h4 class="header__link__cart">@lang('main.about_us') <span><i class="fas fa-angle-down"></i></span></h4>

                                <ul class="header__dropdown">
                                    <li>
                                        <a href="{{ route('about') }}" class="header__link__dropdown">@lang('main.who_we_are')</a>
                                    </li>

                                    <li>
                                        <a href="{{ route('aboutwhats') }}" class="header__link__dropdown">@lang('main.what_we_do') </a>
                                    </li>

                                    <li>
                                        <a href="{{ route('aboutmissions') }}" class="header__link__dropdown">@lang('main.what_we_stand_for')</a>
                                    </li>

                                    <li>
                                        <a href="{{ route('careers') }}" class="header__link__dropdown">@lang('main.careers_and_internships')</a>
                                    </li>
                                </ul>
                            </li>

                            <li>
                                <a href="{{ route('centerabouts') }}" class="header__link__menu">@lang('main.centers')</a>
                            </li>

                            <li>
                                <a href="{{ route('expertpeoples') }}" class="header__link__menu">@lang('main.experts')</a>
                            </li>

                            <li>
                                <h4 class="header__link__cart">@lang('main.outputs')<span><i class="fas fa-angle-down"></i></span></h4>

                                <ul class="header__dropdown">

                                    @foreach(\App\Models\Outputcategory::orderBy('created_at', "DESC")->get() as $outputcategory)
                                    <li>
                                        <a href="{{ route('outputnews', ['id' => $outputcategory->id]) }}" class="header__link__dropdown">{{ $outputcategory->{'title_' . app()->getLocale()} }}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </li>

                            <li>
                                <a href="{{ route('projectnews') }}" class="header__link__menu">@lang('main.projects')</a>
                            </li>

                            <li>
                                <a href="{{ route('events') }}" class="header__link__menu">@lang('main.events')</a>
                            </li>

                            <li>
                                <h4 class="header__link__cart">@lang('main.support')<span><i class="fas fa-angle-down"></i></span></h4>

                                <ul class="header__dropdown">
                                    <li>
                                        <a href="{{ route('support') }}" class="header__link__dropdown">@lang('main.support')</a>
                                    </li>

                                    <li>
                                        <a href="{{ route('donate') }}" class="header__link__dropdown">@lang('main.donate') </a>
                                    </li>
                                </ul>
                            </li>

                            <li>
                                <a href="{{ route('articles') }}" class="header__link__menu">@lang('main.news')</a>
                            </li>

                            <li>
                                <a href="{{ route('contact') }}" class="header__link__menu">@lang('main.contacts')</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </section>
        </div>

        <div class="header__form__cart modal" id="modal1">
            <form action="{{ route('front_search') }}" class="header__form" method="POST">
                @csrf
                <input class="header__form__input" name="phrase" placeholder="@lang('main.search')" type="text">
                <button class="header__form__button" type="submit"><i class="fas fa-search"></i></button>
            </form>
        </div>
    </header>

    <!-- header end -->


    @yield('content')


    <!-- footer start -->

    <footer>
        <div class="footer">
            <section class="container">
                <div class="footer__cart">
                    <div class="footer__list">
                        <div class="footer__item__list">

                            <ul class="footer__list__menu">
                                <li>
                                    <a href="{{ route('about') }}" class="footer__link__menu">@lang('main.about_us')</a>
                                </li>

                                <li>
                                    <a href="{{ route('centerabouts') }}" class="footer__link__menu">@lang('main.centers')</a>
                                </li>

                                <li>
                                    <a href="{{ route('expertpeoples') }}" class="footer__link__menu">@lang('main.experts')</a>
                                </li>

                                <li>
                                    <a href="{{ route('outputnews', ['id' => 1]) }}" class="footer__link__menu">@lang('main.outputs')</a>
                                </li>
                            </ul>

                            <ul class="footer__list__menu">
                                <li>
                                    <a href="{{ route('events') }}" class="footer__link__menu">@lang('main.events')</a>
                                </li>

                                <li>
                                    <a href="{{ route('support') }}" class="footer__link__menu">@lang('main.support')</a>
                                </li>

                                <li>
                                    <a href="{{ route('articles') }}" class="footer__link__menu">@lang('main.news')</a>
                                </li>

                                <li>
                                    <a href="{{ route('contact') }}" class="footer__link__menu">@lang('main.contacts')</a>
                                </li>
                            </ul>

                            <ul class="footer__list__contacts">
                                <li>
                                    <a href="tel:{{ $options->where('key', 'phone')->first()->value }}" class="footer__link__contacts"><span><i class="fas fa-phone-alt"></i></span>{{ $options->where('key', 'phone')->first()->value }}</a>
                                </li>

                                <li>
                                    <a class="footer__link__contacts"><span><i class="fas fa-map-marker-alt"></i></span>{{ $options->where('key', 'address_' . app()->getLocale())->first()->value }}</a>
                                </li>

                                <li>
                                    <a href="mailto:{{ $options->where('key', 'email')->first()->value }}" class="footer__link__contacts"><span><i class="fas fa-envelope"></i></span>{{ $options->where('key', 'email')->first()->value }}</a>
                                </li>
                            </ul>

                        </div>

                        <div class="footer__item">
                            <ul class="footer__item__icons">
                                <li>
                                    <a href="{{ $options->where('key', 'instagram')->first()->value }}" class="footer__link__icons"><i class="fab fa-instagram"></i></a>
                                </li>

                                <li>
                                    <a href="{{ $options->where('key', 'facebook')->first()->value }}" class="footer__link__icons"><i class="fab fa-facebook-f"></i></a>
                                </li>

                                <li>
                                    <a href="{{ $options->where('key', 'youtube')->first()->value }}" class="footer__link__icons"><i class="fab fa-youtube"></i></a>
                                </li>
                            </ul>

                            <h4 class="footer__title__h4">«IAIS» @lang('main.all_rights_reserved')</h4>
                            <h4 class="footer__title__h4">© Copyright 2022 - Web developed by SOS Group</h4>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </footer>

    <!-- footer  end -->


    <script src="{{ asset('front/js/jquery-3.6.1.min.js') }}"></script>
    <script src="{{ asset('front/js/materialize.min.js') }}"></script>
    <script src="{{ asset('front/js/slick.min.js') }}"></script>
    <script src="{{ asset('front/js/fancyapps-ui.js') }}"></script>
    <script src="{{ asset('front/js/fancybox_main.js') }}"></script>
    <script src="{{ asset('front/js/slic.js') }}"></script>
    <script src="{{ asset('front/js/video.js') }}"></script>
    <script src="{{ asset('front/js/index.js') }}"></script>

    @yield('pageScripts')

</body>
</html>

