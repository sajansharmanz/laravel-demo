<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible"
              content="ie=edge">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <title>Document</title>
    </head>

    <body
          class="mx-auto mt-10 max-w-2xl bg-gradient-to-r from-indigo-100 from-10% via-sky-100 via-30% to-emerald-100 to-90% text-slate-700">
        <nav class="mb-8 flex justify-between text-lg font-medium">
            <ul class="flex space-x-2">
                <li>
                    <a href="{{ route('jobs.index') }}">Home</a>
                </li>
            </ul>

            <ul class="flex space-x-2">
                @auth
                    <li>
                        {{ auth()->user()->name ?? 'Anynomus' }}
                    </li>
                    <li>
                        <form action="{{ route('auth.destroy') }}"
                              method="POST">
                            @csrf
                            @method('DELETE')
                            <button>Logout</button>
                        </form>
                    </li>
                @else
                    <li>
                        <a href="{{ route('auth.create') }}">Sign in</a>
                    </li>
                @endauth
            </ul>
        </nav>
        {{ $slot }}
    </body>

</html>
