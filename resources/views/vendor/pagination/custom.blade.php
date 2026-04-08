@if ($paginator->hasPages())
<div class="pagination">

    <!-- Info -->
    <div class="pagination-info">
        Showing
        {{ $paginator->firstItem() }}
        to
        {{ $paginator->lastItem() }}
        of
        {{ $paginator->total() }}
        entries
    </div>

    <!-- Controls -->
    <div class="pagination-controls">

        {{-- Previous --}}
        @if ($paginator->onFirstPage())
            <button class="pagination-btn" disabled>Previous</button>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="pagination-btn">
                Previous
            </a>
        @endif

        {{-- Pages --}}
        @foreach ($elements as $element)

            {{-- Dots --}}
            @if (is_string($element))
                <button class="pagination-btn">{{ $element }}</button>
            @endif

            {{-- Page Numbers --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <button class="pagination-btn active">{{ $page }}</button>
                    @else
                        <a href="{{ $url }}" class="pagination-btn">{{ $page }}</a>
                    @endif
                @endforeach
            @endif

        @endforeach

        {{-- Next --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="pagination-btn">
                Next
            </a>
        @else
            <button class="pagination-btn" disabled>Next</button>
        @endif

    </div>
</div>
@endif
