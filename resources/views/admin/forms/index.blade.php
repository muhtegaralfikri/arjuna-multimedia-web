@extends('admin.layout')

@section('pageTitle', 'Form Minat')

<div class="mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Form Minat Pemasangan</h1>
    <p class="text-gray-600">Daftar form yang diisi oleh calon pelanggan</p>
</div>

@if(session('success'))
<div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
    {{ session('success') }}
</div>
@endif

 {{-- Stats --}}
<div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
    <div class="bg-white rounded-lg shadow-md p-4">
        <p class="text-gray-600 text-sm">Total</p>
        <p class="text-2xl font-bold text-gray-800">{{ $submissions->count() }}</p>
    </div>
    <div class="bg-white rounded-lg shadow-md p-4">
        <p class="text-blue-600 text-sm">Baru</p>
        <p class="text-2xl font-bold text-blue-600">{{ $submissions->where('status', 'new')->count() }}</p>
    </div>
    <div class="bg-white rounded-lg shadow-md p-4">
        <p class="text-yellow-600 text-sm">Dihubungi</p>
        <p class="text-2xl font-bold text-yellow-600">{{ $submissions->where('status', 'contacted')->count() }}</p>
    </div>
    <div class="bg-white rounded-lg shadow-md p-4">
        <p class="text-green-600 text-sm">Berhasil</p>
        <p class="text-2xl font-bold text-green-600">{{ $submissions->where('status', 'converted')->count() }}</p>
    </div>
</div>

<div class="bg-white rounded-lg shadow-md overflow-hidden">
    <div class="overflow-x-auto">
        <table class="min-w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="text-left py-3 px-4 text-gray-600 text-sm font-medium">Nama</th>
                    <th class="text-left py-3 px-4 text-gray-600 text-sm font-medium">WhatsApp</th>
                    <th class="text-left py-3 px-4 text-gray-600 text-sm font-medium">Paket</th>
                    <th class="text-left py-3 px-4 text-gray-600 text-sm font-medium">Status</th>
                    <th class="text-left py-3 px-4 text-gray-600 text-sm font-medium">Tanggal</th>
                    <th class="text-left py-3 px-4 text-gray-600 text-sm font-medium">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($submissions as $submission)
                    <tr class="border-b border-gray-100 hover:bg-gray-50">
                        <td class="py-3 px-4">
                            <div class="font-medium text-gray-800">{{ $submission->name }}</div>
                            <div class="text-sm text-gray-500">{{ Str::limit($submission->address, 30) }}</div>
                        </td>
                        <td class="py-3 px-4">
                            <a href="https://wa.me/{{ ltrim($submission->whatsapp, '0') }}" target="_blank" class="text-green-600 hover:text-green-700">
                                {{ $submission->whatsapp }}
                            </a>
                        </td>
                        <td class="py-3 px-4 text-gray-600">
                            {{ $submission->package_interest ?? '-' }}
                        </td>
                        <td class="py-3 px-4">
                            @if($submission->status === 'new')
                                <span class="px-2 py-1 bg-blue-100 text-blue-800 text-xs rounded-full">Baru</span>
                            @elseif($submission->status === 'contacted')
                                <span class="px-2 py-1 bg-yellow-100 text-yellow-800 text-xs rounded-full">Dihubungi</span>
                            @elseif($submission->status === 'converted')
                                <span class="px-2 py-1 bg-green-100 text-green-800 text-xs rounded-full">Berhasil</span>
                            @else
                                <span class="px-2 py-1 bg-gray-100 text-gray-800 text-xs rounded-full">Batal</span>
                            @endif
                        </td>
                        <td class="py-3 px-4 text-gray-600 text-sm">
                            {{ $submission->created_at->format('d/m/Y H:i') }}
                        </td>
                        <td class="py-3 px-4">
                            <div class="flex space-x-2">
                                <a href="{{ route('admin.forms.show', $submission->id) }}" class="text-blue-600 hover:text-blue-700 text-sm">
                                    Detail
                                </a>
                                <form action="{{ route('admin.forms.destroy', $submission->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus form ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-700 text-sm">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @if($submissions->count() === 0)
        <div class="text-center py-8 text-gray-500">
            <p>Belum ada form submission</p>
        </div>
    @endif
</div>
