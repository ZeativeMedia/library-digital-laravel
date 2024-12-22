<dialog id="modals_tambah_data_buku" class="modal modal-bottom sm:modal-middle">
    <form method="POST" action="{{ route('books.store') }}" enctype="multipart/form-data" class="modal-box">
        @csrf
        <h3 class="text-lg font-bold border-b pb-3">Tambah Data Buku</h3>

        <div class="flex flex-col gap-3 mt-5">
            <div class="flex flex-col gap-2">
                <img id="coverPreviews" class="w-40 h-full rounded-lg" src="#" alt="Cover Preview">
                <p class="text-sm font-bold mt-2">Pilih Cover Buku</p>
                <input type="file" name="cover" class="file-input file-input-bordered px-0 input-sm w-full"
                    accept="image/*" onchange="previewImage(event)" required />
            </div>
            <div class="flex flex-col gap-2">
                <p class="text-sm font-bold mt-2">Judul</p>
                <input type="text" name="title" placeholder="Buku Cinta Love Story"
                    class="input input-bordered input-sm w-full" required />
            </div>
            <div class="flex flex-col gap-2">
                <p class="text-sm font-bold mt-2">Author</p>
                <input type="text" name="author" placeholder="Shintia" class="input input-bordered input-sm w-full"
                    required />
            </div>
            <div class="flex flex-col gap-2">
                <p class="text-sm font-bold mt-2">Stok</p>
                <input type="number" name="stock" placeholder="5" class="input input-bordered input-sm w-full"
                    required />
            </div>
            <div class="flex flex-col gap-2">
                <p class="text-sm font-bold mt-2">Rilis Pada</p>
                <input type="number" name="year_published" placeholder="2014"
                    class="input input-bordered input-sm w-full" required />
            </div>
        </div>

        <div class="modal-action">
            <button type="button" onclick="modals_tambah_data_buku.close()"
                class="btn btn-sm btn-error text-white">Batal</button>
            <button type="submit" class="btn btn-sm btn-info text-white">Kirim</button>
        </div>
    </form>
</dialog>

<script>
    const thumbnails = document.getElementById('coverPreviews');
    thumbnails.style.display = 'none';

    function previewImage(event) {
        const file = event.target.files[0];
        const reader = new FileReader();

        reader.onload = function() {
            thumbnails.src = reader.result;
            thumbnails.style.display = 'block';
        }

        if (file) {
            reader.readAsDataURL(file);
        }
    }
</script>
