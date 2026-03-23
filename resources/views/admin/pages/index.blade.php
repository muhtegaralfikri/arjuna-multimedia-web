@extends('admin.layout')

@section('pageTitle', 'Halaman')

<div class="mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Halaman</h1>
    <p class="text-gray-600">Kelola konten halaman website</p>
</div>

@if(session('success'))
<div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
    {{ session('success') }}
</div>
@endif

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach($pages as $page)
        <div class="bg-white rounded-lg shadow-md p-6">
            <h3 class="text-lg font-bold text-gray-800 mb-2">{{ $page->title }}</h3>
            <p class="text-sm text-gray-500 mb-4">/{{ $page->slug }}</p>

            @if($page->hero_title)
                <p class="text-sm text-gray-700 mb-2">
                    <strong>Hero Title:</strong> {{ Str::limit($page->hero_title, 40) }}
                </p>
            @endif

            @if($page->meta_title)
                <p class="text-sm text-gray-700 mb-4">
                    <strong>Meta Title:</strong> {{ Str::limit($page->meta_title, 40) }}
                </p>
            @endif

            <a href="{{ route('admin.pages.edit', $page->slug) }}"
                class="inline-block bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                Edit Halaman
            </a>
        </div>
    @endforeach
</div>
