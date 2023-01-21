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
