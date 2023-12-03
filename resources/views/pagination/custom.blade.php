<div>
    Showing {{ $paginator->firstItem() }} to {{ $paginator->lastItem() }} of {{ $paginator->total() }} entries
</div>
<ul class="pagination pagination-primary">
    @if (!$paginator->onFirstPage())
        <li class="page-item">
            <a href="{{ $paginator->previousPageUrl() }}" class="page-link" rel="prev" data-page="{{ $paginator->currentPage() - 1 }}">‹</a>
        </li>
    @endif

    @for ($i = 1; $i <= $paginator->lastPage(); $i++)
        @if ($i == $paginator->currentPage())
            <li class="page-item active mx-0">
                <span class="page-link">{{ $i }}</span>
            </li>
        @else
            <li class="page-item">
                <a href="{{ $paginator->url($i) }}" class="page-link" data-page="{{ $i }}">{{ $i }}</a>
            </li>
        @endif
    @endfor

    @if ($paginator->hasMorePages())
        <li class="page-item">
            <a href="{{ $paginator->nextPageUrl() }}" class="page-link" rel="next" data-page="{{ $paginator->currentPage() + 1 }}">›</a>
        </li>
    @endif
</ul>
