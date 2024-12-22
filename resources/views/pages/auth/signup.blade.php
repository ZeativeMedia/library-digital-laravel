<x-layouts title="Sign Up" class="my-auto">
    <form action="{{ route('auth.signup') }}" method="POST" class="flex flex-col mx-auto my-10">
        @csrf

        <div class="flex items-center mb-3 gap-2 mx-auto w-full justify-center text-2xl">
            <h1 class="font-bold opacity-50">Masuk ke</h1>
            <x-brand class="text-3xl" />
        </div>
        <p class="text-center max-w-xs mb-8">Baca Mudah, Dunia di Genggamanmu!</p>

        <div class="flex flex-col mt-10 gap-4">
            <div>
                <p class="text-sm mb-1">Masukan Nama</p>
                <input type="text" name="name" placeholder="User Cerdas"
                    class="input input-bordered w-full max-w-xs" />
                @error('name')
                    <p class="text-sm text-custom mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <p class="text-sm mb-1">Masukan Email</p>
                <input type="email" name="email" placeholder="tester@gmail.com"
                    class="input input-bordered w-full max-w-xs" />
                @error('email')
                    <p class="text-sm text-custom mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <p class="text-sm mb-1">Masukan Password</p>
                <input type="password" name="password" placeholder="*******"
                    class="input input-bordered w-full max-w-xs" />
                @error('password')
                    <p class="text-sm text-custom mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <p class="text-sm mb-1">Konfirmasi Password</p>
                <input type="password" name="password_confirmation" placeholder="*******"
                    class="input input-bordered w-full max-w-xs" />
                @error('password_confirmation')
                    <p class="text-sm text-custom mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="space-y-3 w-full text-center mt-4">
                <button class="btn btn-md bg-custom w-full text-white">Daftar</button>
                <p class="text-sm">Sudah punya akun? <a href="/auth/signin" class="text-custom underline">Masuk</a></p>
            </div>
        </div>
    </form>
</x-layouts>
