<?php 
    /** @var $paginator \Illuminate\Pagination\LengthAwarePaginator */
    
?>
@if($paginator->hasPages())
    <nav class="pagination my-large">

        {{-- <a href="#" class="pagination-item">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" style="width: 18px">
            <path stroke-linecap="round" stroke-linejoin="round"
            d="m18.75 4.5-7.5 7.5 7.5 7.5m-6-15L5.25 12l7.5 7.5" />
        </svg>
        </a> --}}
        @if($paginator->onFirstPage())
            <span class="pagination-item">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" style="width: 18px">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                </svg>
            </span>
        @else
            <a href="{{$paginator->previousPageUrl()}}" class="pagination-item">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" style="width: 18px">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
            </svg>
            </a>
        @endif
        
        @foreach($elements as $element)
            @if(is_string($element))
                <span class="pagination-item"> {{$element}}</span>
            @else
                @if(is_array($element))
                    @foreach($element as $page => $url)
                        @if($page == $paginator->currentPage())
                            <span class="pagination-item active"> {{$page}}</span>
                        @else
                            <a href="{{$url}}" class="pagination-item"> {{$page}} </a>
                        @endif
                    @endforeach
                @endif
            @endif
        @endforeach

        {{-- <a href="#" class="pagination-item"> 1 </a>
        <a href="#" class="pagination-item"> 2 </a>
        <span class="pagination-item active"> 3 </span>
        <a href="#" class="pagination-item"> 4 </a> --}}

        @if($paginator->onLastPage())
            <span class="pagination-item">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" style="width: 18px">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                </svg>
            </span>
        @else
            <a href="{{$paginator->nextPageUrl()}}" class="pagination-item">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" style="width: 18px">
                <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
            </svg>
            </a>
        @endif
        {{-- <a href="#" class="pagination-item">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" style="width: 18px">
            <path stroke-linecap="round" stroke-linejoin="round"
            d="m5.25 4.5 7.5 7.5-7.5 7.5m6-15 7.5 7.5-7.5 7.5" />
        </svg>
        </a> --}}
        {{-- {{$cars->links('pagination')}} --}}
    </nav>
@endif
