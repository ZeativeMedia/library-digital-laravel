<x-layouts title="Sign In" class="my-auto">
    <form action="{{ route('auth.signin') }}" method="POST" class="flex flex-col mx-auto my-10">
        @csrf

        <div class="flex items-center mb-3 gap-2 mx-auto w-full justify-center text-2xl">
            <h1 class="font-bold opacity-50">Masuk ke</h1>
            <x-brand class="text-3xl" />
        </div>
        <p class="text-center max-w-xs mb-8">Baca Mudah, Dunia di Genggamanmu!</p>

        @if (session('success'))
        <div class="bg-success text-white p-4 mt-5 rounded mb-4 w-full">
            {{ session('success') }}
        </div>
        @endif

        <div class="flex flex-col mt-10 gap-4">
            <div>
                <p class="text-sm mb-1">Masukan Email</p>
                <input type="email" name="email" placeholder="tester@gmail.com" class="input input-bordered w-full max-w-xs" />
                @error('email')
                <p class="text-sm text-custom mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <p class="text-sm mb-1">Masukan Password</p>
                <input type="password" name="password" placeholder="********" class="input input-bordered w-full max-w-xs" />
                @error('password')
                <p class="text-sm text-custom mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="space-y-3 w-full text-center mt-4">
                <button class="btn btn-md bg-custom w-full text-white">Masuk</button>
                <p class="text-sm">Belum punya akun? <a href="/auth/signup" class="text-custom underline">Daftar</a></p>
            </div>
        </div>
    </form>
</x-layouts>
