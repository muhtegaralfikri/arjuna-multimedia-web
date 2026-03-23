@extends('admin.layout')

@section('pageTitle', 'Paket Internet')

<div class="mb-6 flex justify-between items-center">
    <div>
        <h1 class="text-2xl font-bold text-gray-800">Paket Internet</h1>
        <p class="text-gray-600">Kelola paket internet yang tersedia</p>
    </div>
    <a href="{{ route('admin.packages.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
        + Tambah Paket
    </a>
</div>

@if(session('success'))
<div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
    {{ session('success') }}
</div>
@endif

<div class="bg-white rounded-lg shadow-md overflow-hidden">
    <div class="overflow-x-auto">
        <table class="min-w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="text-left py-3 px-4 text-gray-600 text-sm font-medium">Nama Paket</th>
                    <th class="text-left py-3 px-4 text-gray-600 text-sm font-medium">Kecepatan</th>
                    <th class="text-left py-3 px-4 text-gray-600 text-sm font-medium">Harga/bulan</th>
                    <th class="text-left py-3 px-4 text-gray-600 text-sm font-medium">Kategori</th>
                    <th class="text-left py-3 px-4 text-gray-600 text-sm font-medium">Status</th>
                    <th class="text-left py-3 px-4 text-gray-600 text-sm font-medium">Urutan</th>
                    <th class="text-left py-3 px-4 text-gray-600 text-sm font-medium">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($packages as $package)
                    <tr class="border-b border-gray-100 hover:bg-gray-50">
                        <td class="py-3 px-4">
                            <div class="font-medium text-gray-800">{{ $package->name }}</div>
                            @if($package->is_popular)
                                <span class="inline-block mt-1 px-2 py-0.5 bg-yellow-100 text-yellow-800 text-xs rounded-full">Populer</span>
                            @endif
                        </td>
                        <td class="py-3 px-4 text-gray-600">{{ $package->speed }}</td>
                        <td class="py-3 px-4 text-gray-800 font-medium">Rp {{ number_format($package->price_monthly, 0, ',', '.') }}</td>
                        <td class="py-3 px-4">
                            @if($package->category === 'home')
                                <span class="px-2 py-1 bg-blue-100 text-blue-800 text-xs rounded-full">Rumah</span>
                            @else
                                <span class="px-2 py-1 bg-green-100 text-green-800 text-xs rounded-full">Bisnis</span>
                            @endif
                        </td>
                        <td class="py-3 px-4">
                            @if($package->is_active)
                                <span class="px-2 py-1 bg-green-100 text-green-800 text-xs rounded-full">Aktif</span>
                            @else
                                <span class="px-2 py-1 bg-red-100 text-red-800 text-xs rounded-full">Non-aktif</span>
                            @endif
                        </td>
                        <td class="py-3 px-4 text-gray-600">{{ $package->sort_order ?? '-' }}</td>
                        <td class="py-3 px-4">
                            <div class="flex space-x-2">
                                <a href="{{ route('admin.packages.edit', $package->id) }}" class="text-blue-600 hover:text-blue-700 text-sm">
                                    Edit
                                </a>
                                <form action="{{ route('admin.packages.destroy', $package->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus paket ini?');">
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
    @if($packages->count() === 0)
        <div class="text-center py-8 text-gray-500">
            <p>Belum ada paket internet</p>
            <a href="{{ route('admin.packages.create') }}" class="text-blue-600 hover:text-blue-700 mt-2 inline-block">Tambah paket pertama</a>
        </div>
    @endif
</div>
