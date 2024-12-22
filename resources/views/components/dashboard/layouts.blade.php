    @php
        $LIST_ADMIN_MENU = [
            ['modal' => 'modals_tambah_data_buku', 'icon' => 'plus', 'title' => ''],
            ['href' => '/dashboard/reports', 'icon' => 'album', 'title' => 'Laporan Pinjaman'],
            ['href' => '/dashboard/users', 'icon' => 'users', 'title' => 'Manajemen User'],
        ];
    @endphp

    <x-layouts :title="$title" class="p-5 gap-10">
        @if (session('success'))
            <div class="bg-success/60 text-white px-4 py-2 rounded-xl w-full">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="bg-error/60 text-white px-4 py-2 rounded-xl w-full">
                {{ session('error') }}
            </div>
        @endif

        @role('admin')
            <section class="grid grid-cols-[repeat(auto-fit,minmax(200px,1fr))] gap-5">
                @foreach ($LIST_ADMIN_MENU as $i => $item)
                    <a href="{{ $item['href'] ?? '#' }}" onclick="{{ $item['modal'] ?? '' }}.showModal()"
                        class="flex items-center cursor-pointer justify-center gap-4 whitespace-nowrap px-5 {{ $i == 0 ? '' : '' }} py-2 h-fit font-semibold rounded-lg border {{ $i == 0 ? 'bg-purple' : 'bg-custom text-white' }}">
                        <x-dynamic-component :component="'lucide-' . $item['icon']"
                            class="size-5 {{ $i == 0 ? 'stroke-custom' : 'stroke-white' }} flex-shrink-0" />
                        <h1>{{ $item['title'] }}</h1>
                    </a>
                @endforeach
                <div
                    class="flex flex-col items-center justify-center gap-3 px-5 py-2 h-fit font-semibold rounded-lg border">
                    <h1>.....</h1>
                </div>
            </section>
        @endrole

        {{ $slot }}
    </x-layouts>
