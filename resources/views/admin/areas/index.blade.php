@extends('admin.layout')

@section('pageTitle', 'Area Layanan')

<div class="mb-6 flex justify-between items-center">
    <div>
        <h1 class="text-2xl font-bold text-gray-800">Area Layanan</h1>
        <p class="text-gray-600">Kelola area cakupan layanan</p>
    </div>
    <a href="{{ route('admin.areas.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
        + Tambah Area
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
                    <th class="text-left py-3 px-4 text-gray-600 text-sm font-medium">Nama Area</th>
                    <th class="text-left py-3 px-4 text-gray-600 text-sm font-medium">Status</th>
                    <th class="text-left py-3 px-4 text-gray-600 text-sm font-medium">Deskripsi</th>
                    <th class="text-left py-3 px-4 text-gray-600 text-sm font-medium">Urutan</th>
                    <th class="text-left py-3 px-4 text-gray-600 text-sm font-medium">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($areas as $area)
                    <tr class="border-b border-gray-100 hover:bg-gray-50">
                        <td class="py-3 px-4">
                            <div class="font-medium text-gray-800">{{ $area->name }}</div>
                            @if($area->estimated_available)
                                <div class="text-sm text-gray-500">Est: {{ $area->estimated_available->format('d/m/Y') }}</div>
                            @endif
                        </td>
                        <td class="py-3 px-4">
                            @if($area->status === 'available')
                                <span class="px-2 py-1 bg-green-100 text-green-800 text-xs rounded-full">Tersedia</span>
                            @elseif($area->status === 'coming_soon')
                                <span class="px-2 py-1 bg-yellow-100 text-yellow-800 text-xs rounded-full">Segera</span>
                            @else
                                <span class="px-2 py-1 bg-red-100 text-red-800 text-xs rounded-full">Jeda</span>
                            @endif
                        </td>
                        <td class="py-3 px-4 text-gray-600 max-w-xs truncate">
                            {{ Str::limit($area->description, 50) }}
                        </td>
                        <td class="py-3 px-4 text-gray-600">{{ $area->sort_order ?? '-' }}</td>
                        <td class="py-3 px-4">
                            <div class="flex space-x-2">
                                <a href="{{ route('admin.areas.edit', $area->id) }}" class="text-blue-600 hover:text-blue-700 text-sm">
                                    Edit
                                </a>
                                <form action="{{ route('admin.areas.destroy', $area->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus area ini?');">
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
    @if($areas->count() === 0)
        <div class="text-center py-8 text-gray-500">
            <p>Belum ada area layanan</p>
            <a href="{{ route('admin.areas.create') }}" class="text-blue-600 hover:text-blue-700 mt-2 inline-block">Tambah area pertama</a>
        </div>
    @endif
</div>
