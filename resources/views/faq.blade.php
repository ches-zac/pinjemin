@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 mt-6">
    <h2 class="text-2xl font-bold text-center mb-6">Frequently Asked Questions</h2>

    <div class="space-y-4">
        @foreach ($faqs as $index => $faq)
            <div class="rounded-lg border border-gray-300 shadow-sm bg-white">
                <button
                    class="w-full text-left px-4 py-3 flex justify-between items-center font-semibold hover:bg-gray-100 transition"
                    onclick="toggleAccordion({{ $index }})"
                    aria-expanded="false"
                    aria-controls="faq-{{ $index }}">
                    {{ $faq['question'] }}
                    <svg id="icon-{{ $index }}" class="w-6 h-6 transform transition-transform" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div
                    id="faq-{{ $index }}"
                    class="hidden px-4 py-2 text-gray-600">
                    {{ $faq['answer'] }}
                </div>
            </div>
        @endforeach
    </div>
</div>

<script>
    function toggleAccordion(index) {
        const answer = document.getElementById(`faq-${index}`);
        const icon = document.getElementById(`icon-${index}`);

        if (answer.classList.contains('hidden')) {
            answer.classList.remove('hidden');
            icon.classList.add('rotate-180');
        } else {
            answer.classList.add('hidden');
            icon.classList.remove('rotate-180');
        }
    }
</script>
@endsection
