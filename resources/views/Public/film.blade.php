@extends('_Layouts.base')

@section('content')
<div class="relative mx-auto w-3/4 h-full z-10">
    <div class="flex flex-row">
        <div class="w-1/3 z-10">
            <img class="block w-full h-auto z-20" alt="..." 
                 src="https://media.21cineplex.com/webcontent/gallery/pictures/171706414775783_405x594.jpg">
        </div>
        <div class="w-2/3 p-8 z-10 backdrop-blur-lg flex flex-col
                    bg-gradient-to-r from-black/60 to-black/80">
            <div class="mb-4 text-6xl font-bold text-white">{{ $film }}</div>
            <div class="mb-1 text-2xl font-medium text-gray-200">Duration: 2h 30m</div>
            <div class="mb-2 text-xl text-gray-200">Rating: PG-13</div>
            <div class="mt-1 min-h-48 overflow-hidden text-balance text-transparent font-medium antialiased
                        bg-clip-text bg-gradient-to-b from-gray-200 from-60% to-transparent to-100%">
                        Gru, Lucy, Margo, Edith, dan Agnes siap menyambut anggota baru di keluarga. 
                        Di tengah kebahagiaan, Gru harus menghadapi penjahat bernama 
                        Maxime Le Mal yang berniat membalas dendam kepada Gru. 
                        Apakah Gru bisa menyelamatkan keluarga kecilnya?
            </div>
            <a class="mt-8 max-h-16 flex-grow font-semibold text-xl text-yellow-500 hover:text-white
                      text-center content-center rounded-md border-2 border-yellow-500 hover:bg-yellow-500"
                href=""> <i class="bi bi-play-circle mr-1"></i> Watch Trailer
            </a>
        </div>
    </div>

    <div class="p-8 w-full backdrop-blur-lg flex flex-col
                bg-gradient-to-r from-black/60 to-black/80">
        <div class="w-full flex flex-row items-center text-gray-200">
            <div class="mr-3 min-w-32 text-2xl font-medium">Playing At</div>
            <select class="mr-3 w-1/5 bg-neutral-700 rounded-lg ring-2 ring-transparent
                           border border-transparent outline-none focus:ring-emerald-600" 
                           name="kota" id="kota">
                <option value="sby">Surabaya</option>
                <option value="jkt">Jakarta</option>
            </select>
            <div class="w-4/5 relative text-white">
                <i class="bi bi-search absolute inset-y-0 start-0 flex 
                            items-center ps-3 pointer-events-none ml-1"></i>
                <input class=" w-full p-2 ps-10 rounded-lg bg-neutral-700 outline-none
                              ring-2 ring-neutral-700 focus:ring-emerald-600"
                placeholder="Search Cinema..." required/>
            </div>
        </div>
        <hr class="h-1 my-4 bg-emerald-700 border-0 rounded-md">
        <div class="w-full">
            <div class="mb-3 w-full rounded-md">
                <div class="px-3 py-2 text-xl text-gray-200
                            rounded-t-md bg-emerald-600/30">
                Galaxy Mall Surabaya XXI</div>
                <div class="rounded-b-md bg-gray-600/30">
                    <div class="px-6 py-3 flex gap-4 
                                content-center text-md">
                        <a class="py-2 px-3 border-2 border-emerald-700 rounded-md
                                  shadow-lg text-gray-200 hover:bg-emerald-700" 
                                  href=""> 19:30
                        </a>
                        <a class="py-2 px-3 border-2 border-emerald-700 rounded-md
                                  shadow-lg text-gray-200 hover:bg-emerald-700" 
                                  href=""> 19:30
                        </a>
                        <a class="py-2 px-3 border-2 border-emerald-700 rounded-md
                                  shadow-lg text-gray-200 hover:bg-emerald-700" 
                                  href=""> 19:30
                        </a>
                        <a class="py-2 px-3 border-2 border-emerald-700 rounded-md
                                  shadow-lg text-gray-200 hover:bg-emerald-700" 
                                  href=""> 19:30
                        </a>
                        <div class="ml-auto self-center text-xl
                                    text-gray-200">Jumat, 05-Juli-2024</div>
                    </div>
                    <div class="px-6 py-3 flex gap-4 
                                content-center text-md">
                        <a class="py-2 px-3 border-2 border-emerald-700 rounded-md
                                  shadow-lg text-gray-200 hover:bg-emerald-700" 
                                  href=""> 19:30
                        </a>
                        <a class="py-2 px-3 border-2 border-emerald-700 rounded-md
                                  shadow-lg text-gray-200 hover:bg-emerald-700" 
                                  href=""> 19:30
                        </a>
                        <a class="py-2 px-3 border-2 border-emerald-700 rounded-md
                                  shadow-lg text-gray-200 hover:bg-emerald-700" 
                                  href=""> 19:30
                        </a>
                        <a class="py-2 px-3 border-2 border-emerald-700 rounded-md
                                  shadow-lg text-gray-200 hover:bg-emerald-700" 
                                  href=""> 19:30
                        </a>
                        <div class="ml-auto self-center text-xl
                                    text-gray-200">Jumat, 05-Juli-2024</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="fixed z-0 top-0 left-0 bottom-0 w-full h-full
            backdrop-blur-xl bg-neutral-600/40"></div>
<img class="fixed -z-10 top-0 bottom-0 w-full h-full object-fill" alt="..."
     src="https://media.21cineplex.com/webcontent/gallery/pictures/171706414775783_405x594.jpg">
@endsection