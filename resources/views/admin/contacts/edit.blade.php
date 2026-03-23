@extends('admin.layout')

@section('pageTitle', 'Edit Kontak')

<div class="mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Kontak</h1>
    <p class="text-gray-600">Kelola informasi kontak Arjuna Net</p>
</div>

@if(session('success'))
<div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
    {{ session('success') }}
</div>
@endif

<div class="bg-white rounded-lg shadow-md p-6">
    <form method="POST" action="{{ route('admin.contacts.update') }}">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="whatsapp_number" class="block text-gray-700 text-sm font-medium mb-2">Nomor WhatsApp *</label>
                <input type="text" id="whatsapp_number" name="whatsapp_number" value="{{ old('whatsapp_number', $contact->whatsapp_number) }}" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="6281234567890">
                <p class="mt-1 text-sm text-gray-500">Format: 628xxxxxxxx (tanpa +, spasi, atau -)</p>
                @error('whatsapp_number')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="phone_number" class="block text-gray-700 text-sm font-medium mb-2">Nomor Telepon *</label>
                <input type="text" id="phone_number" name="phone_number" value="{{ old('phone_number', $contact->phone_number) }}" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="02112345678">
                @error('phone_number')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="email" class="block text-gray-700 text-sm font-medium mb-2">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email', $contact->email) }}"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="info@arjuna-net.com">
                @error('email')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="operating_hours" class="block text-gray-700 text-sm font-medium mb-2">Jam Operasional</label>
                <input type="text" id="operating_hours" name="operating_hours" value="{{ old('operating_hours', $contact->operating_hours) }}"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Senin - Sabtu, 08:00 - 17:00">
                @error('operating_hours')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="col-span-2">
                <label for="address" class="block text-gray-700 text-sm font-medium mb-2">Alamat *</label>
                <textarea id="address" name="address" rows="3" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Jl. Contoh No. 123, Desa Sukamaju, Kecamatan Contoh, Kabupaten Contoh, Indonesia">{{ old('address', $contact->address) }}</textarea>
                @error('address')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="col-span-2">
                <label for="google_maps_link" class="block text-gray-700 text-sm font-medium mb-2">Link Google Maps</label>
                <input type="text" id="google_maps_link" name="google_maps_link" value="{{ old('google_maps_link', $contact->google_maps_link) }}"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="https://maps.google.com/...">
                @error('google_maps_link')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="col-span-2">
                <label for="google_maps_embed" class="block text-gray-700 text-sm font-medium mb-2">Google Maps Embed Code</label>
                <textarea id="google_maps_embed" name="google_maps_embed" rows="4"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="<iframe ...>">{{ old('google_maps_embed', $contact->google_maps_embed) }}</textarea>
                @error('google_maps_embed')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="col-span-2 border-t pt-6">
                <h3 class="text-lg font-medium text-gray-800 mb-4">Media Sosial</h3>
            </div>

            <div>
                <label for="instagram_url" class="block text-gray-700 text-sm font-medium mb-2">Instagram</label>
                <input type="text" id="instagram_url" name="instagram_url" value="{{ old('instagram_url', $contact->instagram_url) }}"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="https://instagram.com/arjunanet">
                @error('instagram_url')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="facebook_url" class="block text-gray-700 text-sm font-medium mb-2">Facebook</label>
                <input type="text" id="facebook_url" name="facebook_url" value="{{ old('facebook_url', $contact->facebook_url) }}"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="https://facebook.com/arjunanet">
                @error('facebook_url')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="tiktok_url" class="block text-gray-700 text-sm font-medium mb-2">TikTok</label>
                <input type="text" id="tiktok_url" name="tiktok_url" value="{{ old('tiktok_url', $contact->tiktok_url) }}"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="https://tiktok.com/@arjunanet">
                @error('tiktok_url')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="mt-6 flex justify-end space-x-3">
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                Update Kontak
            </button>
        </div>
    </form>
</div>
