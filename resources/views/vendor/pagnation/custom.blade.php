<!-- resources/views/vendor/pagination/custom.blade.php -->

@if ($paginator->hasPages())
    <nav class="flex items-center gap-x-1">
        <!-- Previous Page Link -->
        @if ($paginator->onFirstPage())
            <button type="button" class="min-h-[32px] min-w-8 py-1.5 px-2 inline-flex justify-center items-center gap-x-2 text-sm rounded-full text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-white/10 dark:focus:bg-white/10" disabled>
                <i class="ti ti-chevron-left text-sm leading-tight font-medium"></i>
                <span aria-hidden="true" class="sr-only leading-tight">Previous</span>
            </button>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="min-h-[32px] min-w-8 py-1.5 px-2 inline-flex justify-center items-center gap-x-2 text-sm rounded-full text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-white/10 dark:focus:bg-white/10">
                <i class="ti ti-chevron-left text-sm leading-tight font-medium"></i>
                <span aria-hidden="true" class="sr-only leading-tight">Previous</span>
            </a>
        @endif

        <!-- Pagination Elements -->
        @foreach ($elements as $element)
            <!-- "Three Dots" Separator -->
            @if (is_string($element))
                <span class="min-h-[32px] min-w-8 flex justify-center items-center text-gray-800 hover:bg-gray-100 py-1.5 px-2.5 text-sm rounded-full focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-white/10 dark:focus:bg-white/10">{{ $element }}</span>
            @endif

            <!-- Array Of Links -->
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="min-h-[32px] min-w-8 flex justify-center items-center bg-gray-200 text-gray-800 py-1.5 px-2.5 text-sm rounded-full focus:outline-none focus:bg-gray-300 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-600 dark:text-white dark:focus:bg-gray-500">{{ $page }}</span>
                    @else
                        <a href="{{ $url }}" class="min-h-[32px] min-w-8 flex justify-center items-center text-gray-800 hover:bg-gray-100 py-1.5 px-2.5 text-sm rounded-full focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-white/10 dark:focus:bg-white/10">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        <!-- Next Page Link -->
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="min-h-[32px] min-w-8 py-1.5 px-2 inline-flex justify-center items-center gap-x-2 text-sm rounded-full text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-white/10 dark:focus:bg-white/10">
                <span aria-hidden="true" class="sr-only leading-tight">Next</span>
                <i class="ti ti-chevron-right text-sm leading-tight font-medium"></i>
            </a>
        @else
            <button type="button" class="min-h-[32px] min-w-8 py-1.5 px-2 inline-flex justify-center items-center gap-x-2 text-sm rounded-full text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-white/10 dark:focus:bg-white/10" disabled>
                <span aria-hidden="true" class="sr-only leading-tight">Next</span>
                <i class="ti ti-chevron-right text-sm leading-tight font-medium"></i>
            </button>
        @endif
    </nav>
@endif
