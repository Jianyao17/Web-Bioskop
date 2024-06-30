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
    <nav class="bg-emerald-800 text-gray-200 z-20 h-16
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
    
    @yield('content')

    <script defer src="{{ asset('js/flowbite.js') }}"></script>
</body>
</html>