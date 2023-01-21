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

    {{-- {{ $outputnews->links("vendor.pagination.pagination")}} --}}
</div>
