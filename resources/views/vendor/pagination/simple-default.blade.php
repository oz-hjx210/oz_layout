@if ($paginator->hasPages())
     <div class="font-sans flex justify-end space-x-1 select-none">
        @if ($paginator->onFirstPage())
            <span   class="flex items-center px-4 py-2 text-gray-500 bg-gray-300 rounded-md"><i class="fa fa-angle-left" aria-hidden="true"></i></span>
         @else
            <a href="{{ $paginator->previousPageUrl() }}" class="flex items-center px-4 py-2 text-gray-500 bg-gray-300 rounded-md"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
         @endif
            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <span aria-disabled="true">
                                <span class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 cursor-default leading-5">{{ $element }}</span>
                            </span>
                @endif
            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                         <a href="#" class="px-4 py-2 text-white bg-indigo-600 rounded-md hover:bg-indigo-600 hover:text-white">{{ $page }}</a>

                    @else

                        <a href="{{ $url }}" class="px-4 py-2 text-gray-700 bg-gray-200 rounded-md hover:bg-indigo-600 hover:text-white"> {{ $page }}</a>

                    @endif
                @endforeach
            @endif
            @endforeach

            @if ($paginator->hasMorePages())

                <a href="{{ $paginator->nextPageUrl() }}" class="px-4 py-2 font-bold text-gray-500 bg-gray-300 rounded-md hover:bg-indigo-600 hover:text-white"><i class="fa fa-angle-right" aria-hidden="true"></i></a>

            @else
                <span   class="px-4 py-2 font-bold text-gray-500 bg-gray-300 rounded-md hover:bg-indigo-600 hover:text-white"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
            @endif
    </div>
@endif
