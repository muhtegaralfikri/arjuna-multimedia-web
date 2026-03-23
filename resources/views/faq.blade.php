@extends('layouts.app')

@section('seo')
@php
    $faqSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'FAQPage',
        'mainEntity' => []
    ];

    foreach($faqs as $faq) {
        $faqSchema['mainEntity'][] = [
            '@type' => 'Question',
            'name' => $faq->question,
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => strip_tags($faq->answer)
            ]
        ];
    }
@endphp
<script type="application/ld+json">
{!! json_encode($faqSchema, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) !!}
</script>
@endsection

@section('content')
@php
    $page = \App\Models\Page::bySlug('faq')->first();
    $faqs = \App\Models\Faq::published()->ordered()->get();
    $categories = [
        'general' => 'Umum',
        'technical' => 'Teknis',
        'billing' => 'Billing',
        'installation' => 'Pemasangan'
    ];
@endphp

@include('partials.hero-page', ['page' => $page])

<section class="py-16">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Search --}}
        <div class="max-w-xl mx-auto mb-12">
            <div class="relative">
                <input type="text" id="faq-search" placeholder="Cari pertanyaan..." class="w-full px-4 py-3 pl-12 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                <svg class="w-5 h-5 text-gray-400 absolute left-4 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
            </div>
        </div>

        {{-- Category Filter --}}
        <div class="flex flex-wrap justify-center gap-2 mb-8">
            <button onclick="filterFAQ('all')" class="faq-cat-btn active px-4 py-2 rounded-full border border-gray-300 text-sm font-medium transition" data-category="all">Semua</button>
            @foreach($categories as $key => $label)
            <button onclick="filterFAQ('{{ $key }}')" class="faq-cat-btn px-4 py-2 rounded-full border border-gray-300 text-sm font-medium transition" data-category="{{ $key }}">{{ $label }}</button>
            @endforeach
        </div>

        {{-- FAQ Accordion --}}
        <div class="max-w-3xl mx-auto space-y-4" id="faq-container">
            @foreach($faqs as $index => $faq)
            <div class="faq-item bg-white rounded-xl shadow-md overflow-hidden" data-category="{{ $faq->category }}" data-question="{{ strtolower($faq->question) }}">
                <button onclick="toggleFAQ({{ $index }})" class="faq-question w-full px-6 py-4 text-left flex items-center justify-between hover:bg-gray-50 transition">
                    <span class="font-semibold text-gray-900">{{ $faq->question }}</span>
                    <svg class="faq-icon w-5 h-5 text-gray-500 transform transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div id="faq-answer-{{ $index }}" class="faq-answer hidden px-6 pb-4 text-gray-600">
                    {!! $faq->answer !!}
                    @if($faq->category !== 'general')
                    <span class="inline-block mt-2 px-2 py-1 bg-gray-100 text-gray-600 text-xs rounded">{{ $categories[$faq->category] }}</span>
                    @endif
                </div>
            </div>
            @endforeach
        </div>

        @if($faqs->isEmpty())
        <div class="text-center py-12">
            <p class="text-gray-600">Belum ada FAQ tersedia saat ini.</p>
        </div>
        @endif
    </div>
</section>

{!! $page->content ?? '' !!}

{{-- CTA --}}
@php $contact = \App\Models\Contact::getContact(); @endphp
@if($contact)
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h3 class="text-2xl font-bold mb-4">Masih Ada Pertanyaan?</h3>
        <p class="text-gray-600 mb-8">Jangan ragu untuk menghubungi kami</p>
        <a href="{{ $contact->whatsapp_link }}" target="_blank" class="inline-flex items-center px-6 py-3 bg-primary-600 text-white rounded-lg hover:bg-primary-700 transition">
            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-1.454-.001-2.866.32-4.171.877l-2.633-1.629 1.736 5.737z"/>
            </svg>
            Tanya via WhatsApp
        </a>
    </div>
</section>
@endif

<script>
function toggleFAQ(index) {
    const answer = document.getElementById('faq-answer-' + index);
    const button = answer.previousElementSibling;
    const icon = button.querySelector('.faq-icon');

    answer.classList.toggle('hidden');
    icon.classList.toggle('rotate-180');
}

function filterFAQ(category) {
    const buttons = document.querySelectorAll('.faq-cat-btn');
    buttons.forEach(btn => {
        btn.classList.remove('active', 'bg-primary-600', 'text-white', 'border-primary-600');
    });

    event.target.classList.add('active', 'bg-primary-600', 'text-white', 'border-primary-600');

    const items = document.querySelectorAll('.faq-item');
    items.forEach(item => {
        if (category === 'all' || item.dataset.category === category) {
            item.style.display = 'block';
        } else {
            item.style.display = 'none';
        }
    });
}

// Search functionality
document.getElementById('faq-search')?.addEventListener('input', function(e) {
    const searchTerm = e.target.value.toLowerCase();
    const items = document.querySelectorAll('.faq-item');

    items.forEach(item => {
        const question = item.dataset.question;
        const answer = item.querySelector('.faq-answer')?.textContent.toLowerCase() || '';
        if (question.includes(searchTerm) || answer.includes(searchTerm)) {
            item.style.display = 'block';
        } else {
            item.style.display = 'none';
        }
    });
});
</script>
@endsection
