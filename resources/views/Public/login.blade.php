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

<body class="flex items-center justify-center min-h-screen 
             font-roboto pt-16 bg-neutral-900">
    {{-- Navbar --}}
    <nav class="bg-emerald-800 text-gray-200 z-20 h-16
                border-emerald-800 border-b-2 top-0 fixed w-full">
        <div class="max-w-screen mx-auto flex justify-between">
            <a href="/" class="flex flex-row items-center gap-2 p-4">
                <div class="font-medium text-xl">Web Bioskop</div>
            </a>
            <div class="w-auto mx-3 flex flex-row gap-1 self-center">
                <a class="py-2 px-3 flex flex-row items-center rounded-md shadow-xl
                          cursor-pointer hover:bg-emerald-700 active:bg-emerald-900/50"
                          href="/login">
                    <i class="bi bi-box-arrow-in-right mr-2 text-2xl"></i>
                    <div class="text-lg px-2"> Login </div>
                </a>
            </div>
        </div>
    </nav>
    
    <form class="p-6 max-w-sm w-full flex flex-col mx-auto bg-neutral-800/80 
                  rounded-lg shadow-lg border border-neutral-700">
        <div class="mb-3 text-2xl font-bold text-white">Login Bioskop</div>
        <div class="mb-5">
            <label class="block mb-2 text-sm font-medium text-gray-200" for="email">Input email</label>
            <input type="email" placeholder="YourEmail@example.com" required
                   class="block w-full p-2.5 border bg-neutral-700 border-neutral-800 text-gray-200 
                          text-sm rounded-lg focus:ring-emerald-700 focus:border-emerald-700"/>
        </div>
        <div class="mb-8">
            <label for="password" class="block mb-2 text-sm font-medium text-gray-200">Input password</label>
            <input type="password" id="password" required 
                   class="block w-full p-2.5 border bg-neutral-700 border-neutral-800 text-gray-200 
                          text-sm rounded-lg focus:ring-emerald-700 focus:border-emerald-700"/>
        </div>
        <button class="mb-3 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 
                       text-center text-white bg-emerald-700 hover:bg-emerald-800 
                       focus:ring-4 focus:outline-none focus:ring-emerald-300" 
                       type="submit">Login</button>
        <p class="text-sm font-light text-gray-300">
            Don’t have an account yet? 
            <a href="/register" class="font-medium hover:underline">Register</a>
        </p>
    </form>

    <script defer src="{{ asset('js/flowbite.js') }}"></script>
</body>
</html>