<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <div class="flex items-center justify-center my-2">
        <h1>Buku Tamu</h1>
        @if (session()->has('sukses'))
            <div class="">{{ session('sukses') }}</div>
        @endif
    </div>

    <div class="flex items-center justify-center mb-5">
        <form wire:submit="store">
            <fieldset class="fieldset w-xs bg-base-200 border border-base-300 p-4 rounded-box">
                <legend class="fieldset-legend">Tambah Tamu</legend>

                <label class="fieldset-label">Nama</label>
                <input type="text" class="input" wire:model="nama" placeholder="Masukkan nama tamu..." />
                @error('nama')
                    <div class="text-red-500">
                        {{ $message }}
                    </div>
                @enderror
                <label class="fieldset-label">Alamat</label>
                <input type="text" class="input" wire:model="alamat" placeholder="Masukkan alamat tamu..." />
                @error('alamat')
                    <div class="text-red-500">
                        {{ $message }}
                    </div>
                @enderror

                <label class="fieldset-label">Tujuan</label>
                <input type="text" class="input" wire:model="tujuan" placeholder="Masukkan tujuan tamu..." />
                @error('tujuan')
                    <div class="text-red-500">
                        {{ $message }}
                    </div>
                @enderror

                <label class="fieldset-label">Tanggal</label>
                <input type="date" class="input" wire:model="tanggal" />
                @error('tanggal')
                    <div class="text-red-500">
                        {{ $message }}
                    </div>
                @enderror

                <button type="submit" class="btn">Simpan</button>
            </fieldset>
        </form>
    </div>

    <div class="flex items-center justify-center">
        <div>
            <div class="overflow-x-auto rounded-box border border-base-content/5 bg-base-100 mb-5">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Tujuan</th>
                            <th>Tanggal</th>
                            <th>Preview</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($guests as $guest)
                            <tr>
                                <td>{{ $guest->nama }}</td>
                                <td>{{ $guest->alamat }}</td>
                                <td>{{ $guest->tujuan }}</td>
                                <td>{{ $guest->tanggal }}</td>
                                <td>
                                    <button type="button" class="btn" wire:click="preview({{ $guest->id }})">Lihat</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $guests->links() }}
        </div>
    </div>

    @if ($showPreview && $previewGuest)
    <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white p-6 rounded-lg w-[90%] max-w-md">
            <h1 class="text-center">Detail Tamu</h1>
            <p>
                <strong>Nama: </strong> {{ $previewGuest->nama }}
            </p>
            <p>
                <strong>Alamat: </strong> {{ $previewGuest->alamat }}
            </p>
            <p>
                <strong>Tujuan: </strong> {{ $previewGuest->tujuan }}
            </p>
            <p>
                <strong>Tanggal: </strong> {{ $previewGuest->tanggal }}
            </p>
            <button wire:click="nonaktifPreview" type="button" class="mt-4 bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Tutup</button>
        </div>
    </div>
    @endif
</div>

