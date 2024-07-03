<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    
    @livewireStyles
    <link rel="stylesheet" href="/css/styles.css">
    <link href="{{ asset('css/flowbite.css') }}" rel="stylesheet">
    <style>
        [modal-backdrop] {
            z-index: 30 !important;
        }
    </style>
    
    <title>{{ $page ?? 'Document' }}</title>
</head>
<body class="font-roboto pt-16 bg-neutral-900">

    <!-- Toast Container -->
    <div id="liveToast" role="alert" aria-atomic="true" 
         class="fixed place-self-center left-0 right-0 top-0 mt-2 z-50 border rounded-lg font-medium
                min-w-80 shadow-xl shadow-neutral-900/40 border-green-600 bg-green-700 text-white
                transition-all ease-in-out duration-500 transform -translate-y-10 opacity-0 hidden">
        <div class="flex flex-row justify-between">
            <i class="bi bi-exclamation-circle p-3 pl-4"></i>
            <div id="message" class="py-3 flex-grow text-left"></div>
            <button type="button"
                    aria-label="Close" data-dismiss-target="#liveToast"
                    class="px-3 py-2 rounded-lg outline-none hover:bg-neutral-800/30">
                <i class="bi bi-x-lg"></i>
            </button>
        </div>
    </div>

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
                          href="/logout">
                    <i class="bi bi-box-arrow-right"></i>
                </a>
                {{-- <a class="py-2 px-3 flex flex-row items-center rounded-md shadow-xl
                          cursor-pointer hover:bg-emerald-700 active:bg-emerald-900/50"
                          href="/login">
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
                          hover:bg-emerald-700 hover:text-white active:bg-emerald-900
                          @if ($page == 'Laporan') bg-emerald-700 border-emerald-700 text-white @endif"
                          href="/empty/laporan" > 
                    <i class="bi bi-clipboard-data ml-1 mr-2"></i> Laporan
                </a>
                <a class="flex items-center mb-2 p-2 rounded-lg border border-transparent
                          hover:bg-emerald-700 hover:text-white active:bg-emerald-900
                          @if ($page == 'Penayangan') bg-emerald-700 border-emerald-700 text-white @endif"
                          href="/empty/penayangan" > 
                    <i class="bi bi-cast ml-1 mr-2"></i> Penayangan
                </a>
                <a class="flex items-center mb-2 p-2 rounded-lg border border-transparent
                          hover:bg-emerald-700 hover:text-white active:bg-emerald-900
                          @if ($page == 'Film') bg-emerald-700 border-emerald-700 text-white @endif"
                          href="/empty/film" > 
                    <i class="bi bi-film ml-1 mr-2"></i> Film
                </a>
                <a class="flex items-center mb-2 p-2 rounded-lg border border-transparent
                          hover:bg-emerald-700 hover:text-white active:bg-emerald-900
                          @if ($page == 'Teater') bg-emerald-700 border-emerald-700 text-white @endif"
                          href="/empty/teater" > 
                    <i class="bi bi-buildings ml-1 mr-2"></i> Teater
                </a>
                <a class="flex items-center mb-2 p-2 rounded-lg border border-transparent
                          hover:bg-emerald-700 hover:text-white active:bg-emerald-900
                          @if ($page == 'Users') bg-emerald-700 border-emerald-700 text-white @endif"
                          href="/users" > 
                    <i class="bi bi-people ml-1 mr-2"></i> Users
                </a>
                
            </div>
        </aside>
        <div class="ml-56 px-8 py-7">
            @yield('content')
        </div>
    </div>
    @livewireScripts
    <script defer src="{{ asset('js/flowbite.js') }}" crossorigin="anonymous"></script>
    <script>
        const toastElement = document.getElementById('liveToast');

        window.addEventListener('notify', event => {
            toastElement.classList.remove('bg-red-700', 'border-red-600');
            toastElement.classList.remove('bg-green-700', 'border-green-600');

            if (event.detail.type == 'success') {
                toastElement.classList.add('bg-green-700', 'border-green-600');
            } else if (event.detail.type == 'failed') {
                toastElement.classList.add('bg-red-700', 'border-red-600');
            }

            document.getElementById('message').innerHTML = event.detail.message;
            
            toastElement.classList.remove('hidden', 'opacity-0', '-translate-y-10');
            toastElement.classList.add('opacity-100', 'translate-y-0');

            setTimeout(() => {
                toastElement.classList.remove('opacity-100', 'translate-y-0');
                toastElement.classList.add('opacity-0', '-translate-y-10');
                setTimeout(() => {
                    toastElement.classList.add('hidden');
                }, 500);
            }, 3000);
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            
            // Inisialisasi modal dengan semua elemen yang memiliki class form
            const modals = document.querySelectorAll('.modal');
            const modalInstances = [];

            modals.forEach(modalEl => {
                modalInstances.push(new Modal(modalEl));
            });

            // Event listener untuk menutup modal
            window.addEventListener('close-modal', () => {
                modalInstances.forEach(modal => {
                    modal.hide();
                    document.querySelector("body > div[modal-backdrop]")?.remove()
                });
            });
        });
    </script>
</body>
</html>