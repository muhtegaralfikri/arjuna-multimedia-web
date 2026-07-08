@extends('admin.layout')

@section('pageTitle', 'Edit Testimoni')

@section('content')
<div class="mb-6 flex items-center justify-between">
    <div>
        <h1 class="text-2xl font-bold text-slate-900 tracking-tight">Edit Testimoni</h1>
        <p class="text-slate-500 text-sm mt-1">Perbarui testimoni yang tampil di website.</p>
    </div>
    <a href="{{ route('admin.testimonials.index') }}" class="inline-flex items-center px-4 py-2 bg-white border border-slate-200 rounded-xl font-medium text-sm text-slate-600 hover:bg-slate-50 hover:text-slate-900 transition-colors shadow-sm">
        Kembali
    </a>
</div>

<div class="bg-white rounded-2xl shadow-sm border border-slate-200/60 overflow-hidden">
    <div class="p-6 sm:p-8">
        <form method="POST" action="{{ route('admin.testimonials.update', $testimonial->id) }}">
            @csrf
            @method('PUT')
            @include('admin.testimonials.form', ['testimonial' => $testimonial])
        </form>
    </div>
</div>
@endsection
