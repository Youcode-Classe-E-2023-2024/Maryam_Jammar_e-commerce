<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body>
<header>
    <div class="container mx-auto px-6 ">
        <div class="flex items-center justify-between">
            <div class="hidden w-full text-gray-600 md:flex md:items-center">
                <a href="{{route('welcome')}}" class="flex items-center">
                    <svg class="h-5 w-5 mx-2 transform rotate-180" fill="none" stroke-linecap="round" stroke-linejoin="round"
                         stroke-width="3" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        <span class="font-bold">Go back</span>
                    </svg>
                </a>
            </div>
            {{--logo--}}
            <img src="/storage/picture/Beauty_Merry__3.png" alt="test" class="w-16 mx-auto">
            {{--logout--}}
            @auth
                <div class="flex items-center justify-end text-gray-600 w-full">
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                       class="flex items-center">
                        <span class="font-bold">Logout</span>
                        <svg class="h-5 w-5 mx-2" fill="none" stroke-linecap="round" stroke-linejoin="round"
                             stroke-width="3" viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            @endauth
        </div>
    </div>
</header>

<div class="flex flex-col justify-center  ">
    <div class="md:flex md:items-center p-4">
        <div class="w-full h-full md:w-1/2 lg:h-96">
            <img class="h-full w-full rounded-md object-cover max-w-lg mx-auto bg-contain bg-cover bg-center" style="background-image: url('{{ asset($product->picture) }}')">
        </div>
        <div class="w-full max-w-lg mx-auto mt-5 md:ml-8 md:mt-0 md:w-1/2">
            <h3 class="text-gray-700 uppercase text-lg">{{$product->title}}</h3>
            <span class="text-gray-500 mt-3">{{$product->price}} DH</span>
            <hr class="my-3">
            <div class="mt-2">
                <label class="text-gray-700 text-sm" for="count">Categorie :</label>
                <div class="flex items-center mt-1">
                    <h1> {{$category->category}} </h1>
                </div>
            </div>

            <div class="flex items-center mt-6">
                <button class="px-8 py-2 bg-indigo-600 text-white text-sm font-medium rounded hover:bg-indigo-500 focus:outline-none focus:bg-indigo-500">Order Now</button>
                <button class="mx-2 text-gray-600 border rounded-md p-2 hover:bg-gray-200 focus:outline-none">
                    <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                </button>
            </div>
        </div>
    </div>

    <div class=" mt-8 pl-32 pr-32 text-justify">
        <h1 class="text-2xl font-bold">Description :</h1>
        <h2> {{$product->description}} </h2>
    </div>

</div>
<footer class="bg-gray-100 mt-4">
    <div class="container mx-auto px-6 py-4 ">
        <p class="text-center text-sm text-gray-500 ">
            &copy;
            <script>
                document.write(new Date().getFullYear());
            </script>
            All rights reserved.
        </p>    </div>
</footer>
</body>
</html>
