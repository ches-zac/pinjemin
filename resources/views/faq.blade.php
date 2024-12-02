@extends('layouts.app')

@section('content')
    <!-- Content -->
    <div class="flex flex-row">

        <div class="container mx-auto px-4 mt-4">
            <h2 class="text-2xl font-bold mb-4 mt-3">Frequently Asked Questions</h2>
            <div class="accordion">
            <div class="accordion-item max-h-fit rounded-xl bg-white border border-gray-200">
                <h2 class="accordion-header mb-0" id="headingOne">
                <button class="accordion-button relative flex items-center 1  p-5 mt-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    <svg class="w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M19 9l-7 7-7-7" />
                    </svg>
                    Pertanyaan 1
                </button>
                <p class="px-5 py-3">Ini adalah jawaban untuk pertanyaan pertama. Anda dapat menambahkan lebih banyak teks di sini.</p>
                <p class="px-5 py-3">Anda juga  bisa menambahkan elemen HTML lainnya seperti gambar atau daftar.</p>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body p-5">
                    Jawaban untuk pertanyaan 1.
                    <p class="px-3 py-2">Ini adalah jawaban untuk pertanyaan pertama. Anda dapat menambahkan lebih banyak teks di sini.</p>
                    <p class="px-3 py-2">Anda juga bisa menambahkan elemen HTML lainnya seperti    tau daftar.</p>
                </div>
                </div>
            </div>
        </div>

        <div class="container mx-auto px-4 mt-4">
            <h2 class="text-2xl font-bold mb-4 mt-3">Frequently Asked Questions</h2>
            <div class="accordion">
                <div class="accordion-item max-h-fit rounded-xl bg-white border border-gray-200">
                    <h2 class="accordion-header mb-0" id="headingOne">
                    <button class="accordion-button relative flex items-center 1  p-5 mt-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <svg class="w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M19 9l-7 7-7-7" />
                        </svg>
                        Pertanyaan 1
                    </button>
                    <p class="px-5 py-3">Ini adalah jawaban untuk pertanyaan pertama. Anda dapat menambahkan lebih banyak teks di sini.</p>
                    <p class="px-5 py-3">Anda juga  bisa menambahkan elemen HTML lainnya seperti gambar atau daftar.</p>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body p-5">
                        Jawaban untuk pertanyaan 1.
                        <p class="px-3 py-2">Ini adalah jawaban untuk pertanyaan pertama. Anda dapat menambahkan lebih banyak teks di sini.</p>
                        <p class="px-3 py-2">Anda juga bisa menambahkan elemen HTML lainnya seperti    tau daftar.</p>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
