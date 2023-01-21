@extends('layouts.front')

@section('content')

    <!-- about_us start -->

    <div class="about_us" style="background-image: url({{ asset('front/foto/Support_fon.png') }})">
        <section class="container">
            <div class="about_us__cart">
                <div class="about_us__list">
                    <h2 class="about_us__title__h2">@lang('main.contacts')</h2>

                    <ul class="about_us__menu">
                        <li>
                            <a href="{{ route('/') }}" class="about_us__menu__link">@lang('main.main')</a>
                        </li>

                        <li>
                            <a class="about_us__menu__link">@lang('main.contacts')</a>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
    </div>

    <!-- about_us end -->


    <!-- Contacts start -->

    <div class="contacts">
        <section class="container">
            <div class="contacts__cart">

                <h2 class="outputs__title__h2">@lang('main.our_contacts')</h2>
                <div class="contacts__list_our">
                    @foreach ($ourcontacts as $ourcontact)
                    <div class="contacts__item_our">
                        <a href="tel:{{ $ourcontact->phone_number }}" class="contacts__link_our">
                            <span>@lang('main.phone_number'):</span>{{ $ourcontact->phone_number }}
                        </a>
                    </div>

                    <div class="contacts__item_our">
                        <a href="tel:{{ $ourcontact->fax }}" class="contacts__link_our">
                            <span>@lang('main.fax'):</span>{{ $ourcontact->fax }}
                        </a>
                    </div>

                    <div class="contacts__item_our">
                        <a href="mailto:{{ $ourcontact->email }}" class="contacts__link_our">
                            <span>@lang('main.email'):</span>{{ $ourcontact->email }}
                        </a>
                    </div>

                    <div class="contacts__item_our">
                        <a class="contacts__link_our">
                            <span>@lang('main.address'):</span>{{ $ourcontact->{'adsress_' . app()->getLocale()} }}
                        </a>
                    </div>

                    <div class="contacts__item_our">
                        <a class="contacts__link_our">
                            <span>@lang('main.landmarks'):</span>{{ $ourcontact->{'landmarks_' . app()->getLocale()} }}
                        </a>
                    </div>
                    @endforeach
                </div>

                <h2 class="outputs__title__h2">@lang('main.contacts_of_centers')</h2>
                <div class="contacts__list">
                    @foreach ($contactcenters as $contactcenter)

                    <div class="contacts__item">
                        <h3 class="contacts__title__h3">{{ $contactcenter->{'title_' . app()->getLocale()} }}</h3>

                        <ul class="contacts__menu">
                            <li>
                                <a href="tel:{{ $contactcenter->phone_number }}" class="contacts__link_our">
                                    <span>@lang('main.phone_number'):</span>{{ $contactcenter->phone_number }}
                                </a>
                            </li>

                            <li>
                                <a href="mailto:{{ $contactcenter->email }}" class="contacts__link_our">
                                    <span>@lang('main.email'):</span>{{ $contactcenter->email }}
                                </a>
                            </li>
                        </ul>
                    </div>
                   @endforeach
                </div>

                <h2 class="outputs__title__h2">@lang('main.callback')</h2>
                <form action="{{ route('saveCallback') }}" class="contacts__form" method="POST">
                    @csrf
                    <input type="text" name="name" placeholder="Name" class="contacts__input" required>
                    <section class="contacts__list__form">
                        <input type="email" name="email" placeholder="Email" class="contacts__input" required>
                        <input type="tel" name="phone" placeholder="Phone number" class="contacts__input" required>
                    </section>
                    <textarea class="contacts__textarea" name="comment" placeholder="Comment" required></textarea>

                    @if (session('message'))

                    <div style="padding: 20px; background-color: green; color: #fff; margin-top: 15px; width: 100%">
                     <span style="margin-left: 15px; color: #fff; font-weight: bold; float: right; font-size: 22px; line-height: 20px; cursor: pointer; transition: 0.3s;" onclick="this.parentElement.style.display='none';">&times;</span>
                           Your application has been successfully sent
                    </div>

                 @endif
                    <button type="submit" class="contacts__button">@lang('main.send') <span><i class="fas fa-chevron-right"></i></span></button>
                </form>

                <h5 class="contacts__title__h5">@lang('main.map')</h5>
            </div>
        </section>

        <div class="contacts__map">
            {!! $options->where('key', 'map')->first()->value !!}
        </div>
    </div>

    <!-- Contacts end -->

@endsection

