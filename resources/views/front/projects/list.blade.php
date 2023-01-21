@extends('layouts.front')

@section('content')

    <!-- about_us start -->

    <div class="about_us" style="background-image: url({{ asset('front/foto/Projects_fon.png') }})">
        <section class="container">
            <div class="about_us__cart">
                <div class="about_us__list">
                    <h2 class="about_us__title__h2">@lang('main.projects')</h2>

                    <ul class="about_us__menu">
                        <li>
                            <a href="{{ route('/') }}" class="about_us__menu__link">@lang('main.main')</a>
                        </li>

                        <li>
                            <a class="about_us__menu__link">@lang('main.projects')</a>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
    </div>

    <!-- about_us end -->


    <!-- Projects start -->

    <div class="projects">
        <section class="container">
            <div class="projects__cart">
                <div class="projects__list">
                    @foreach ($projectnews as $projectnew)

                    <div class="projects__item">
                        <a href="{{ route('projectnew', $projectnew->{'slug_' . app()->getLocale()}) }}">
                            <div class="projects__img">
                                <img src="{{ asset($projectnew->image) }}" alt="projects">
                            </div>

                            <h4 class="projects__title__h4">{{ $projectnew->{'ongoing_name_' . app()->getLocale()} }}</h4>
                            <div class="projects__text">
                                <p>{{ $projectnew->{'title_' . app()->getLocale()} }}</p>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>

                {{ $projectnews->links("vendor.pagination.pagination")}}

            </div>
        </section>
    </div>

    <!-- Projects end -->

@endsection
