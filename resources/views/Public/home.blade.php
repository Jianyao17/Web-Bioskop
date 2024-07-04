@extends('_Layouts.base')

@section('content')

{{-- Movie Carousel --}}
<div id="default-carousel" class="relative z-10" data-carousel="slide">
    <!-- Carousel wrapper -->
    <div class="relative h-auto overflow-hidden md:h-96">
         <!-- Item 1 -->
        @foreach ($films as $film)
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <div class="flex flex-row mx-auto w-3/4 h-full">
                    <div class="w-1/3 z-10">
                        <img class="block w-full h-auto z-20" alt="..." 
                                src="{{ asset('storage/'.$film->poster_film) }}">
                    </div>
                    <div class="w-2/3 p-8 z-10 backdrop-blur-lg
                                bg-gradient-to-r from-black/50 to-black/80">
                        <div class="mb-4 text-6xl font-bold text-white">{{ $film->judul_film }}</div>
                        <div class="mb-1 text-2xl font-medium text-gray-200">Duration: {{ $film->durasi_menit }}</div>
                        <div class="mb-2 text-xl text-gray-200">Rating: PG-13</div>
                        <div class="mt-1 h-1/2 overflow-hidden text-balance text-transparent font-medium antialiased
                                    bg-clip-text bg-gradient-to-b from-gray-200 from-60% to-transparent to-100%">
                                    {{ $film->deskripsi }}
                        </div>
                    </div>
                    <div class="absolute z-0 top-0 left-0 w-full h-full 
                                backdrop-blur-xl bg-neutral-600/40"></div>
                    <img class="absolute -z-10 top-0 left-0 w-full h-full object-fill" alt="..."
                            src="{{ asset('storage/'.$film->poster_film) }}">
                </div>
            </div>
        @endforeach
    </div>
    <!-- Slider indicators -->
    <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
        @foreach ($films as $film)
            <button type="button" class="w-3 h-3 rounded-full" aria-current="true" 
            aria-label="Slide {{ $loop->index + 1}}" data-carousel-slide-to="{{ $loop->index }}"></button>
        @endforeach
        {{-- <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5" data-carousel-slide-to="4"></button> --}}
    </div>
    <!-- Slider controls -->
    <button type="button" class="absolute top-0 start-10 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
            </svg>
            <span class="sr-only">Previous</span>
        </span>
    </button>
    <button type="button" class="absolute top-0 end-10 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
            <span class="sr-only">Next</span>
        </span>
    </button>
</div>

<div class="m-8">
    <div class="relative text-white">
        <i class="bi bi-search absolute inset-y-0 start-0 flex 
                    items-center ps-3 pointer-events-none ml-1"></i>
        <input class="block w-full p-3 ps-10 text-md rounded-lg bg-neutral-700
                      ring-2 ring-transparent outline-none focus:ring-emerald-600"
        placeholder="Search Movies..." wire:model="search"/>
    </div>
</div>

<div class="m-8 mb-12 grid grid-cols-4 gap-8">
    @foreach ($films as $film)
        <a class="border border-neutral-800 rounded-lg shadow-md cursor-pointer
                    transition ease-in-out hover:scale-105 hover:border-gray-500"
                    href="/film/{{ $film->judul_film }}">
            <img class="block w-full h-fit z-20 rounded-lg" alt="..." 
            src="{{ asset('storage/'.$film->poster_film) }}">
        </a>
    @endforeach
</div>

@endsection