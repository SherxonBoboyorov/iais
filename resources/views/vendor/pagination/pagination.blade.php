@if ($paginator->hasPages())
    <nav>
        <ul class="experts__pagination">
            @if (!$paginator->onFirstPage())
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}" class="experts__pagination__next"rel="prev" aria-label="@lang('pagination.previous')"><i class="fas fa-angle-double-left"></i></a>
                </li>
            @endif

            @foreach ($elements as $element)
                @if (is_string($element))
                    <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li><a class="experts__pagination__link active">{{ $page }}</a></li>
                        @else
                            <li><a class="experts__pagination__link" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}" class="experts__pagination__next" rel="next" aria-label="@lang('pagination.next')"><i class="fas fa-angle-double-right"></i></a>
                </li>
            @endif
        </ul>
    </nav>
@endif
