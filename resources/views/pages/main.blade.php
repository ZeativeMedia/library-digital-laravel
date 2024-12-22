<x-layouts title="">
    <main class="flex flex-col justify-between w-full antialiased">

        @php
            $LIST_THUMBNAILS = [
                'https://images.unsplash.com/photo-1457369804613-52c61a468e7d?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NHx8ZGlnaXRhbCUyMGxpYnJhcnl8ZW58MHx8MHx8fDA%3D',
                'https://images.unsplash.com/photo-1521587760476-6c12a4b040da?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTF8fGRpZ2l0YWwlMjBsaWJyYXJ5fGVufDB8fDB8fHww',
                'https://images.unsplash.com/photo-1472173148041-00294f0814a2?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTV8fGRpZ2l0YWwlMjBsaWJyYXJ5fGVufDB8fDB8fHww',
                'https://images.unsplash.com/photo-1485322551133-3a4c27a9d925?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTZ8fGRpZ2l0YWwlMjBsaWJyYXJ5fGVufDB8fDB8fHww',
                'https://plus.unsplash.com/premium_photo-1730112231198-b958b5cce6c8?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NjV8fGRpZ2l0YWwlMjBsaWJyYXJ5fGVufDB8fDB8fHww',
                'https://images.unsplash.com/photo-1526243741027-444d633d7365?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NzF8fGRpZ2l0YWwlMjBsaWJyYXJ5fGVufDB8fDB8fHww',
            ];
        @endphp

        <section class="text-gray-600 body-font">
            <div class="container px-5 mb-24 mt-10 mx-auto">
                <div class="flex flex-col text-center w-full px-4 py-10 rounded-xl border mb-10 bg-gradient-to-r from-pink-300/10 via-purple-300/20 to-indigo-400/30">
                    <x-brand class="min-[450px]:hidden mx-auto mb-5" />

                    <h1 class="sm:text-3xl text-2xl font-semibold title-font mb-4 text-gray-900">Platform Peminjaman
                        <span class="text-custom font-bold">Buku
                            Digital</span>
                    </h1>
                    <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Temukan berbagai buku menarik yang bisa kamu
                        pinjam secara digital. Dengan BukuSaku, membaca jadi lebih mudah, cepat, dan fleksibel kapan
                        saja dan di mana saja.</p>
                </div>

                <div class="text-gray-600 body-font">
                    <div class="container mx-auto flex px-5 mb-24 md:flex-row flex-col items-center bg-gray-50 p-4 rounded-xl border">
                        <div class="lg:max-w-xs md:w-1/2 w-5/6 mb-10 md:mb-0">
                            <img class="object-cover drop-shadow-2xl object-center rounded-b-[100px]" alt="hero"
                                src="/me-shintia.png">
                        </div>
                        <div
                            class="lg:flex-grow md:w-1/2 lg:pl-24 md:pl-16 flex flex-col md:items-start md:text-left items-center text-center">
                            <h1 class="title-font sm:text-4xl text-3xl mb-16 font-semibold text-gray-900">Shintia <span
                                    class="text-custom font-bold">Widiastuti</span>
                                <br class="font-bold text-gray-400">
                                <span class="font-bold text-gray-400 text-3xl">210101010130 / SI 501</span>
                            </h1>
                            <p class="leading-relaxed capitalize text-2xl"># Pemrograman berbasis web</p>
                            <p class="mb-8 leading-relaxed uppercase font-bold text-2xl">Jurusan sistem informasi</p>
                        </div>
                    </div>
                </div>

                <div class="flex flex-wrap -m-4 justify-center">
                    @foreach ($LIST_THUMBNAILS as $i => $item)
                        <div class="lg:w-1/3 sm:w-1/2 p-4">
                            <div class="flex">
                                <img class="rounded-xl w-full h-full object-cover object-center"
                                    src="{{ $item }}">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

    </main>
</x-layouts>
