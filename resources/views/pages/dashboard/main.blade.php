<x-dashboard.layouts title="Dashboard">
    @role('user')
        <section class="text-gray-600 body-font {{ $borrowed->isEmpty() ? 'hidden' : '' }}">
            <div class="container mx-auto">
                <div class="flex flex-col w-full mb-5">
                    <h1 class="text-2xl font-semibold title-font mb-4 text-gray-900"># Belum Dikembalikan</h1>
                </div>
                <div class="flex flex-wrap -m-2">
                    @foreach ($borrowed as $borrow)
                        <div class="p-2 lg:w-1/3 md:w-1/2 w-full">
                            <div class="h-full flex border-gray-200 border p-4 rounded-lg">
                                <img alt="team"
                                    class="w-1/3 h-full bg-gray-100 object-cover object-center flex-shrink-0 rounded-xl mr-4"
                                    src="{{ asset('storage/' . $borrow->book->cover) }}">
                                <div class="flex-grow">
                                    <h2 class="text-gray-900 title-font font-medium">{{ $borrow->book->title }}</h2>
                                    <p class="text-gray-500">{{ $borrow->book->author }}</p>
                                    <p class="text-gray-500 mt-2 text-sm">Stok <span
                                            class="font-semibold">{{ $borrow->book->stock }}</span></p>
                                    <div class="flex flex-col gap-2 w-full mt-5">
                                        <button type="button"
                                            onclick="{{ 'modals_kembali_data_buku_' . $borrow->id }}.showModal()"
                                            class="btn btn-sm w-full btn-error text-white">Kembalikan</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <dialog id="{{ 'modals_kembali_data_buku_' . $borrow->id }}"
                            class="modal modal-bottom sm:modal-middle">
                            <form method="POST" action="{{ route('transactions.return', $borrow->id) }}"
                                class="modal-box">
                                @csrf
                                @method('PATCH')

                                <h3 class="text-lg font-bold border-b pb-3">Kembalikan Buku</h3>
                                <p class="mt-5">Apakah kamu yakin ingin mengembalikan buku
                                    <strong>{{ $borrow->book->title }}</strong>?
                                </p>

                                <div class="modal-action flex gap-2">
                                    <button type="button" onclick="{{ 'modals_kembali_data_buku_' . $borrow->id }}.close()"
                                        class="btn btn-sm btn-error text-white">Batalkan</button>
                                    <button type="submit" class="btn btn-sm btn-info text-white">Kembalikan</button>
                                </div>
                            </form>
                        </dialog>
                    @endforeach
                </div>
            </div>
        </section>
    @endrole

    <section class="text-gray-600 body-font">
        <div class="container mx-auto">
            <div class="flex flex-col w-full mb-5">
                <h1 class="text-2xl font-semibold title-font mb-4 text-gray-900"># Buku Tersedia</h1>
            </div>
            <div class="flex flex-wrap -m-2">
                @foreach ($books as $book)
                    <div class="p-2 lg:w-1/3 md:w-1/2 w-full">
                        <div class="h-full flex border-gray-200 border p-4 rounded-lg">
                            <img alt="team"
                                class="w-1/3 h-full bg-gray-100 object-cover object-center flex-shrink-0 rounded-xl mr-4"
                                src="{{ $book->cover_url }}">
                            <div class="flex-grow">
                                <h2 class="text-gray-900 title-font font-medium">{{ $book->title }}</h2>
                                <p class="text-gray-500">{{ $book->author }}</p>
                                <p class="text-gray-500 mt-2 text-sm">Stok <span
                                        class="font-semibold">{{ $book->stock }}</span></p>
                                <div class="w-full mt-5">
                                    @role('admin')
                                        <button onclick="{{ 'modals_edit_data_buku_' . $book->id }}.showModal()"
                                            class="btn btn-sm btn-info text-white w-full">Edit Buku</button>
                                    @endrole
                                    @role('user')
                                        @if ($book->stock > 0)
                                            <button type="button"
                                                onclick="{{ 'modals_pinjam_data_buku_' . $book->id }}.showModal()"
                                                class="btn btn-sm btn-info text-white w-full">Pinjam</button>
                                        @else
                                            <button type="button"
                                                class="btn btn-sm btn-disabled btn-info text-white w-full">Stok
                                                Habis</button>
                                        @endif
                                    @endrole
                                </div>
                            </div>
                        </div>
                    </div>

                    <dialog id="{{ 'modals_pinjam_data_buku_' . $book->id }}"
                        class="modal modal-bottom sm:modal-middle">
                        <form method="POST" action="{{ route('transactions.store') }}" class="modal-box">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                            <input type="hidden" name="book_id" value="{{ $book->id }}">
                            <input type="hidden" name="borrow_date" value="{{ now()->toDateString() }}">

                            <h3 class="text-lg font-bold border-b pb-3">Pinjam Buku</h3>
                            <p class="mt-5">Apakah kamu yakin ingin meminjam buku
                                <strong>{{ $book->title }}</strong>?
                            </p>

                            <div class="modal-action flex gap-2">
                                <button type="button" onclick="{{ 'modals_pinjam_data_buku_' . $book->id }}.close()"
                                    class="btn btn-sm btn-error text-white">Batalkan</button>
                                <button type="submit" class="btn btn-sm btn-info text-white">Pinjam</button>
                            </div>
                        </form>
                    </dialog>

                    <dialog id="{{ 'modals_edit_data_buku_' . $book->id }}" class="modal modal-bottom sm:modal-middle">

                        <h3 class="text-lg font-bold border-b pb-3">Edit Data Buku</h3>

                        <div class="modal-box">
                            <form method="POST" action="{{ route('books.update', $book->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="flex flex-col gap-3 mt-5">
                                    <div class="flex flex-col gap-2">
                                        <img id="coverPreviewz" class="w-40 h-full rounded-lg"
                                            src="{{ asset('storage/' . $book->cover) }}" alt="Cover Preview">
                                        <p class="text-sm font-bold mt-2">Cover Buku</p>
                                        <input type="file"
                                            class="file-input file-input-bordered px-0 input-sm w-full" accept="image/*"
                                            name="cover" onchange="previewImage(event)" />
                                    </div>
                                    <div class="flex flex-col gap-2">
                                        <p class="text-sm font-bold mt-2">Judul</p>
                                        <input type="text" name="title" value="{{ old('title', $book->title) }}"
                                            class="input input-bordered input-sm w-full" required />
                                    </div>
                                    <div class="flex flex-col gap-2">
                                        <p class="text-sm font-bold mt-2">Author</p>
                                        <input type="text" name="author"
                                            value="{{ old('author', $book->author) }}"
                                            class="input input-bordered input-sm w-full" required />
                                    </div>
                                    <div class="flex flex-col gap-2">
                                        <p class="text-sm font-bold mt-2">Stok</p>
                                        <input type="number" name="stock"
                                            value="{{ old('stock', $book->stock) }}"
                                            class="input input-bordered input-sm w-full" required />
                                    </div>
                                    <div class="flex flex-col gap-2">
                                        <p class="text-sm font-bold mt-2">Rilis Pada</p>
                                        <input type="number" name="year_published"
                                            value="{{ old('year_published', $book->year_published) }}"
                                            class="input input-bordered input-sm w-full" required />
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-sm btn-info text-white mt-5">Update Buku</button>

                            </form>
                            <div class="flex gap-2 bg-white modal-content w-fit ml-auto -mt-8">
                                <form method="POST" action="{{ route('books.destroy', $book->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-warning text-white">Hapus
                                        Buku</button>
                                </form>
                                <button type="button" onclick="{{ 'modals_edit_data_buku_' . $book->id }}.close()"
                                    class="btn btn-sm btn-error text-white">Batalkan</button>
                            </div>
                        </div>
                    </dialog>
                @endforeach
            </div>
        </div>
    </section>

    </x-dashboard-layouts>

    <script>
        const thumbnailz = document.getElementById('coverPreviewz');
        thumbnailz?.style?.display = 'none';

        function previewImage(event) {
            const file = event.target.files[0];
            const reader = new FileReader();

            reader.onload = function() {
                thumbnailz?.src = reader.result;
                thumbnailz?.style.display = 'block';
            }

            if (file) {
                reader.readAsDataURL(file);
            }
        }
    </script>
