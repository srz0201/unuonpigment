@if ($paginator->hasPages())
<div class="row mt-3">
    <div class="col-12 text-center mx-auto">
        <ul class="pagination  justify-content-center">
            @if ($paginator->onFirstPage())
                <li class="page-item"><a class="page-link" href="#">«</a></li>
            @else
                <li class="page-item"><a class="page-link" href="{{ $paginator->previousPageUrl() }}">«</a></li>
            @endif
                @foreach ($elements as $element)
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li class="page-item active"><a class="page-link" href="#">{{ $page }}</a></li>
                            @else
                                <li class="page-item "><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                            @endif
                        @endforeach
                    @endif
                @endforeach
                @if ($paginator->hasMorePages())
                    <li class="page-item"><a class="page-link" href="{{ $paginator->nextPageUrl() }}">»</a></li>
                @else
                    <li class="page-item"><a class="page-link" href="#">»</a></li>
                @endif
        </ul>
    </div>
</div>
@endif
