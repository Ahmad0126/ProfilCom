@if ($paginator->hasPages())
    <div class="btn-toolbar justify-content-center mb-15">
        <div class="btn-group">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <span href="#" class="btn btn-outline-primary prev"><i class="fa fa-angle-double-left"></i></span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="btn btn-outline-primary prev"><i class="fa fa-angle-double-left"></i></a>
            @endif
            
            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <span class="btn btn-outline-primary">{{ $element }}</span>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span class="btn btn-primary current">{{ $page }}</span>
                        @else
                            <a href="{{ $url }}" class="btn btn-outline-primary">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach
            
            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="btn btn-outline-primary next"><i class="fa fa-angle-double-right"></i></a>
            @else
                <span class="btn btn-outline-primary next"><i class="fa fa-angle-double-right"></i></span>
            @endif
        </div>
    </div>
@endif