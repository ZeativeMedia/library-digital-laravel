<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <x-headers :title="$title" />
</head>

<body class="flex flex-col antialiased w-full min-h-dvh max-w-5xl mx-auto">
    <x-modals />

    <header class="navbar bg-white border-b justify-between">
        <div class="navbar-start gap-5">
            <div class="dropdown">
                <div tabindex="0" role="button" class="btn btn-ghost btn-circle">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h7" />
                    </svg>
                </div>
            </div>
            <x-brand class="max-[450px]:hidden" />
        </div>
        <div class="navbar-end gap-3">
            <a href="#home" class="btn btn-sm btn-ghost">
                Home
            </a>

            <a href="#about" class="btn btn-sm btn-ghost">
                About
            </a>

            @guest
                <a href="/auth/signin" class="btn btn-sm">
                    Masuk
                </a>
            @endguest

            @auth
                <a href="/dashboard" class="btn btn-sm">
                    Dashboard
                </a>

                <form action="{{ route('auth.signout') }}" method="POST">
                    @csrf
                    <button type="submit"class="btn btn-sm btn-error text-white">
                        Logout
                    </button>
                </form>
            @endauth
        </div>

    </header>
    <main class="{{ $class ?? '' }} flex flex-col">
        {{ $slot }}
    </main>
    <footer class="text-gray-600 bg-white body-font border-t mt-auto">
        <div class="container py-5 mx-auto justify-between flex items-center sm:flex-row flex-col">
            <p class="text-sm text-gray-500 sm:ml-4 sm:pl-4 sm:py-2 sm:mt-0 mt-4">
                © 2024 BukuSaku
            </p>
            <p class="text-sm text-gray-500 font-semibold sm:ml-4 sm:pl-4 sm:py-2 sm:mt-0 mt-4">
                Shintia Widiastuti
            </p>
        </div>
    </footer>
</body>

</html>
