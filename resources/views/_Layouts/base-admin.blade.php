<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Document</title>

    <link rel="stylesheet" href="/css/styles.css">
    <link href="{{ asset('css/flowbite.css') }}" rel="stylesheet">
</head>
<body class="font-roboto pt-16 bg-neutral-900">
    {{-- Navbar --}}
    <nav class="bg-emerald-800 text-gray-200 backdrop-blur-md z-20
                border-emerald-800 border-b-2 top-0 fixed w-full">
        <div class="max-w-screen mx-auto flex justify-between">
            <a href="/" class="flex flex-row items-center gap-2 p-4">
                <div class="font-medium text-xl">Web Bioskop</div>
            </a>
            <div class="w-auto mx-3 flex flex-row gap-1 self-center">
                <div class="flex flex-row items-center py-2 px-3 rounded-md shadow-xl">
                    <i class="bi bi-person-square mr-2 text-2xl"></i>
                    <div class="text-lg"> Arief Wiradarma Tan </div>
                </div>
                <a class="py-2 pl-4 pr-3 rounded-md self-center text-2xl 
                          shadow-xl hover:bg-red-600 hover:shadow-red-600/50 
                          cursor-pointer active:bg-red-700 active:shadow-red-700/50"
                          href="">
                    <i class="bi bi-box-arrow-right"></i>
                </a>
                {{-- <a class="py-2 px-3 flex flex-row items-center rounded-md shadow-xl
                          cursor-pointer hover:bg-emerald-700 active:bg-emerald-900/50">
                    <i class="bi bi-box-arrow-in-right mr-2 text-2xl"></i>
                    <div class="text-lg px-2"> Login </div>
                </a> --}}
            </div>
        </div>
    </nav>

    {{-- Side bar --}}
    <div class="text-gray-200">
        <aside class="fixed top-0 left-0 w-56 z-10 h-screen pt-16
                      border-r-2 border-neutral-800 bg-neutral-800/80">
            <div class="h-full pt-8 px-4 overflow-y-auto font-medium text-gray-200">
                <a class="flex items-center mb-2 p-2 rounded-lg border border-transparent
                          hover:bg-emerald-700 hover:text-white active:bg-emerald-900" 
                          {{-- bg-emerald-700 border-emerald-700 text-white --}}
                          href="" > 
                    <i class="bi bi-clipboard-data ml-1 mr-2"></i> Laporan
                </a>
                <a class="flex items-center mb-2 p-2 rounded-lg border border-transparent
                          hover:bg-emerald-700 hover:text-white active:bg-emerald-900" 
                          {{-- bg-emerald-700 border-emerald-700 text-white --}}
                          href="" > 
                    <i class="bi bi-cast ml-1 mr-2"></i> Penayangan
                </a>
                <a class="flex items-center mb-2 p-2 rounded-lg border border-transparent
                          hover:bg-emerald-700 hover:text-white active:bg-emerald-900" 
                          {{-- bg-emerald-700 border-emerald-700 text-white --}}
                          href="" > 
                    <i class="bi bi-film ml-1 mr-2"></i> Film
                </a>
                <a class="flex items-center mb-2 p-2 rounded-lg border border-transparent
                          hover:bg-emerald-700 hover:text-white active:bg-emerald-900" 
                          {{-- bg-emerald-700 border-emerald-700 text-white --}}
                          href="" > 
                    <i class="bi bi-buildings ml-1 mr-2"></i> Bioskop
                </a>
                <a class="flex items-center mb-2 p-2 rounded-lg border border-transparent
                          hover:bg-emerald-700 hover:text-white active:bg-emerald-900" 
                          {{-- bg-emerald-700 border-emerald-700 text-white --}}
                          href="" > 
                    <i class="bi bi-camera-reels ml-1 mr-2"></i> Teater
                </a>
                <a class="flex items-center mb-2 p-2 rounded-lg border border-transparent
                          hover:bg-emerald-700 hover:text-white active:bg-emerald-900" 
                          {{-- bg-emerald-700 border-emerald-700 text-white --}}
                          href="" > 
                    <i class="bi bi-people ml-1 mr-2"></i> Users
                </a>
                
            </div>
        </aside>
        <div class="ml-56 px-8 py-7">
            @yield('content')
        </div>
    </div>

    <script defer src="{{ asset('js/flowbite.js') }}"></script>
</body>
</html>