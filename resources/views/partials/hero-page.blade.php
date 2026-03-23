<div class="bg-gradient-to-br from-primary-600 to-primary-800 text-white py-16 md:py-24">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">{{ $page->hero_title ?? $page->title }}</h1>
        @if($page->hero_subtitle)
        <p class="text-xl text-primary-100">{{ $page->hero_subtitle }}</p>
        @endif
    </div>
</div>
