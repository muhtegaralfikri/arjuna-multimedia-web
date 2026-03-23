@extends('admin.layout')

@section('pageTitle', 'FAQ')

<div class="mb-6 flex justify-between items-center">
    <div>
        <h1 class="text-2xl font-bold text-gray-800">FAQ (Frequently Asked Questions)</h1>
        <p class="text-gray-600">Kelola pertanyaan yang sering ditanyakan</p>
    </div>
    <a href="{{ route('admin.faqs.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
        + Tambah FAQ
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
                    <th class="text-left py-3 px-4 text-gray-600 text-sm font-medium">Pertanyaan</th>
                    <th class="text-left py-3 px-4 text-gray-600 text-sm font-medium">Kategori</th>
                    <th class="text-left py-3 px-4 text-gray-600 text-sm font-medium">Status</th>
                    <th class="text-left py-3 px-4 text-gray-600 text-sm font-medium">Urutan</th>
                    <th class="text-left py-3 px-4 text-gray-600 text-sm font-medium">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($faqs as $faq)
                    <tr class="border-b border-gray-100 hover:bg-gray-50">
                        <td class="py-3 px-4">
                            <div class="font-medium text-gray-800 max-w-md truncate">{{ $faq->question }}</div>
                            <div class="text-sm text-gray-500 max-w-md truncate">{{ Str::limit($faq->answer, 80) }}</div>
                        </td>
                        <td class="py-3 px-4">
                            @if($faq->category === 'general')
                                <span class="px-2 py-1 bg-blue-100 text-blue-800 text-xs rounded-full">Umum</span>
                            @elseif($faq->category === 'technical')
                                <span class="px-2 py-1 bg-purple-100 text-purple-800 text-xs rounded-full">Teknis</span>
                            @elseif($faq->category === 'billing')
                                <span class="px-2 py-1 bg-green-100 text-green-800 text-xs rounded-full">Billing</span>
                            @else
                                <span class="px-2 py-1 bg-orange-100 text-orange-800 text-xs rounded-full">Pemasangan</span>
                            @endif
                        </td>
                        <td class="py-3 px-4">
                            @if($faq->is_published)
                                <span class="px-2 py-1 bg-green-100 text-green-800 text-xs rounded-full">Terbit</span>
                            @else
                                <span class="px-2 py-1 bg-red-100 text-red-800 text-xs rounded-full">Draft</span>
                            @endif
                        </td>
                        <td class="py-3 px-4 text-gray-600">{{ $faq->sort_order ?? '-' }}</td>
                        <td class="py-3 px-4">
                            <div class="flex space-x-2">
                                <a href="{{ route('admin.faqs.edit', $faq->id) }}" class="text-blue-600 hover:text-blue-700 text-sm">
                                    Edit
                                </a>
                                <form action="{{ route('admin.faqs.destroy', $faq->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus FAQ ini?');">
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
    @if($faqs->count() === 0)
        <div class="text-center py-8 text-gray-500">
            <p>Belum ada FAQ</p>
            <a href="{{ route('admin.faqs.create') }}" class="text-blue-600 hover:text-blue-700 mt-2 inline-block">Tambah FAQ pertama</a>
        </div>
    @endif
</div>
