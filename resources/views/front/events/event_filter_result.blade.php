
                <div class="outputs_in__list__cart">


                    <div class="outputs_in__list">
                      @foreach ($past as $eventproduct)
                        <div class="outputs_in__item">
                            <a href="{{ route('eventproduct', $eventproduct->{'slug_' . app()->getLocale()}) }}">
                                <div class="outputs_in__img">
                                    <img src="{{ asset($eventproduct->image) }}" alt="outputs_in">
                                </div>

                                <section>
                                    <div class="outputs__item__cart">
                                        @if($eventproduct->event_date > now())
                                        <h4 class="events__title__h4">@lang('main.upcoming_events')</h4>
                                        @else

                                        <h4 class="events__title__h4">@lang('main.past_events')</h4>

                                        @endif
                                        <h5 class="outputs__title__h5">{{ $eventproduct->created_at->format('F d, Y') }}</h5>
                                    </div>

                                    <h3 class="outputs__title__h3">{{ $eventproduct->{'title_' . app()->getLocale()} }}</h3>

                                    <div class="outputs__text">
                                        <p>{!! $eventproduct->{'description_' . app()->getLocale()} !!}</p>
                                    </div>
                                </section>
                            </a>
                        </div>
                      @endforeach
                    </div>

                    {{-- {{ $upcoming->links("vendor.pagination.pagination")}} --}}

                </div>
