@extends('layouts.portal')

@section('title', 'White Papers')
@section('header_title', 'Technical White Papers')

@section('content')
    <div class="mb-8">
        <p class="text-gray-500">Deep dive technical documents and research.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($whitePapers as $paper)
        <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm hover:shadow-lg transition-all group relative overflow-hidden">
            <div class="absolute top-0 right-0 w-24 h-24 bg-teal-50 rounded-bl-full -mr-4 -mt-4 transition group-hover:scale-110"></div>
            
            <div class="relative z-10">
                <div class="w-12 h-12 rounded-xl bg-teal-100 text-teal-600 flex items-center justify-center mb-4 shadow-sm group-hover:bg-teal-600 group-hover:text-white transition">
                    <i class="fa-solid fa-file-lines text-xl"></i>
                </div>
                
                <div class="text-xs font-bold text-teal-600 mb-2 uppercase tracking-wider">Technical Paper</div>
                <h3 class="font-bold text-xl mb-3 leading-snug group-hover:text-teal-700 transition">{{ $paper->title }}</h3>
                <p class="text-sm text-gray-500 mb-6">{{ Str::limit($paper->description, 100) }}</p>
                
                <button 
                    class="open-modal-btn w-full py-3 rounded-xl border border-gray-200 font-semibold text-sm hover:bg-black hover:text-white hover:border-black transition flex items-center justify-center gap-2"
                    data-id="{{ $paper->id }}"
                    data-title="{{ $paper->title }}"
                    data-type="White Paper">
                    <span>Request Access</span>
                    <i class="fa-solid fa-lock text-xs"></i>
                </button>
            </div>
        </div>
        @endforeach
    </div>
@endsection