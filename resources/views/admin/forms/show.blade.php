@extends('admin.layout')

@section('pageTitle', 'Detail Form')

<div class="mb-6">
    <a href="{{ route('admin.forms.index') }}" class="text-blue-600 hover:text-blue-700 text-sm mb-2 inline-block">
        &larr; Kembali ke Daftar
    </a>
    <h1 class="text-2xl font-bold text-gray-800">Detail Form Minat</h1>
    <p class="text-gray-600">Detail dari calon pelanggan</p>
</div>

@if(session('success'))
<div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
    {{ session('success') }}
</div>
@endif

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    {{-- Form Details --}}
    <div class="lg:col-span-2 bg-white rounded-lg shadow-md p-6">
        <h2 class="text-lg font-bold text-gray-800 mb-4">Informasi Pelanggan</h2>

        <div class="space-y-4">
            <div>
                <label class="text-gray-600 text-sm">Nama</label>
                <p class="text-gray-800 font-medium">{{ $submission->name }}</p>
            </div>

            <div>
                <label class="text-gray-600 text-sm">WhatsApp</label>
                <p class="text-gray-800">
                    <a href="https://wa.me/{{ ltrim($submission->whatsapp, '0') }}" target="_blank" class="text-green-600 hover:text-green-700">
                        {{ $submission->whatsapp }}
                    </a>
                </p>
            </div>

            <div>
                <label class="text-gray-600 text-sm">Paket Diminati</label>
                <p class="text-gray-800">{{ $submission->package_interest ?? 'Tidak ditentukan' }}</p>
            </div>

            <div>
                <label class="text-gray-600 text-sm">Alamat</label>
                <p class="text-gray-800">{{ $submission->address }}</p>
            </div>

            @if($submission->message)
                <div>
                    <label class="text-gray-600 text-sm">Pesan</label>
                    <p class="text-gray-800 bg-gray-50 p-3 rounded-lg">{{ $submission->message }}</p>
                </div>
            @endif

            <div>
                <label class="text-gray-600 text-sm">Waktu Submit</label>
                <p class="text-gray-800">{{ $submission->created_at->format('d/m/Y H:i:s') }}</p>
            </div>
        </div>

        <div class="mt-6 pt-6 border-t">
            <h3 class="text-lg font-bold text-gray-800 mb-4">Catatan Admin</h3>
            <form method="POST" action="{{ route('admin.forms.update', $submission->id) }}">
                @csrf
                @method('PUT')
                <textarea id="notes" name="notes" rows="4"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 mb-4"
                    placeholder="Tambah catatan...">{{ old('notes', $submission->notes) }}</textarea>
                @error('notes')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </form>
        </div>
    </div>

    {{-- Status Update --}}
    <div class="bg-white rounded-lg shadow-md p-6">
        <h2 class="text-lg font-bold text-gray-800 mb-4">Status</h2>

        <form method="POST" action="{{ route('admin.forms.update', $submission->id) }}">
            @csrf
            @method('PUT')

            <div class="space-y-3">
                <label class="flex items-start p-3 border rounded-lg cursor-pointer hover:bg-gray-50 {{ $submission->status === 'new' ? 'border-blue-500 bg-blue-50' : '' }}">
                    <input type="radio" name="status" value="new" {{ $submission->status === 'new' ? 'checked' : '' }} class="mt-1 mr-3">
                    <div>
                        <div class="font-medium text-gray-800">Baru</div>
                        <div class="text-sm text-gray-500">Belum diproses</div>
                    </div>
                </label>

                <label class="flex items-start p-3 border rounded-lg cursor-pointer hover:bg-gray-50 {{ $submission->status === 'contacted' ? 'border-yellow-500 bg-yellow-50' : '' }}">
                    <input type="radio" name="status" value="contacted" {{ $submission->status === 'contacted' ? 'checked' : '' }} class="mt-1 mr-3">
                    <div>
                        <div class="font-medium text-gray-800">Dihubungi</div>
                        <div class="text-sm text-gray-500">Sudah menghubungi</div>
                    </div>
                </label>

                <label class="flex items-start p-3 border rounded-lg cursor-pointer hover:bg-gray-50 {{ $submission->status === 'converted' ? 'border-green-500 bg-green-50' : '' }}">
                    <input type="radio" name="status" value="converted" {{ $submission->status === 'converted' ? 'checked' : '' }} class="mt-1 mr-3">
                    <div>
                        <div class="font-medium text-gray-800">Berhasil</div>
                        <div class="text-sm text-gray-500">Berhasil menjadi pelanggan</div>
                    </div>
                </label>

                <label class="flex items-start p-3 border rounded-lg cursor-pointer hover:bg-gray-50 {{ $submission->status === 'lost' ? 'border-gray-500 bg-gray-50' : '' }}">
                    <input type="radio" name="status" value="lost" {{ $submission->status === 'lost' ? 'checked' : '' }} class="mt-1 mr-3">
                    <div>
                        <div class="font-medium text-gray-800">Batal</div>
                        <div class="text-sm text-gray-500">Tidak jadi berlangganan</div>
                    </div>
                </label>
            </div>

            <button type="submit" class="w-full mt-6 bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition">
                Update Status
            </button>
        </form>

        <div class="mt-6 pt-6 border-t">
            <form action="{{ route('admin.forms.destroy', $submission->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus form ini?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="w-full bg-red-600 text-white py-2 px-4 rounded-lg hover:bg-red-700 transition">
                    Hapus Form
                </button>
            </form>
        </div>

        <div class="mt-6 pt-6 border-t">
            <a href="https://wa.me/{{ ltrim($submission->whatsapp, '0') }}?text={{ urlencode("Halo " . $submission->name . ", saya dari Arjuna Net. Terima kasih sudah mengisi form minat pemasangan. Apakah ada yang bisa saya bantu?") }}"
                target="_blank"
                class="block w-full bg-green-600 text-white py-2 px-4 rounded-lg hover:bg-green-700 transition text-center">
                Chat via WhatsApp
            </a>
        </div>
    </div>
</div>
