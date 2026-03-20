@extends('admin.portal')

@section('title', 'Create Article')
@section('header_title', 'Create Article')

@section('content')
<div class="max-w-3xl mx-auto px-4">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold"></h1>
        <a href="{{ route('admin.dashboard') }}" class="text-gray-600 hover:text-gray-900">
            &larr; Back
        </a>
    </div>

    <div class="bg-white rounded-xl shadow p-6">
        @if ($errors->any())
            <div class="mb-6 rounded-xl border border-red-200 bg-red-50 p-4">
                <div class="flex items-start gap-3">
                    <i class="fa-solid fa-triangle-exclamation text-red-500 mt-0.5"></i>
                    <div>
                        <p class="font-semibold text-red-700 text-sm">
                            Please fix the following errors:
                        </p>
                        <ul class="mt-2 list-disc list-inside text-sm text-red-600 space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif

        <form action="{{ route('admin.articles.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('admin.articles._form', ['article' => null])
        </form>
    </div>
</div>

@endsection

@push('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script>
    function toggleSource() {
        const type = document.querySelector('input[name="source_type"]:checked')?.value;
        const editorWrap = document.getElementById('editor-wrap');
        const pdfWrap = document.getElementById('pdf-wrap');
        if (type === 'editor') {
            editorWrap.classList.remove('hidden');
            pdfWrap.classList.add('hidden');
        } else {
            editorWrap.classList.add('hidden');
            pdfWrap.classList.remove('hidden');
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('input[name="source_type"]').forEach(el => el.addEventListener('change', toggleSource));
        toggleSource();

        ClassicEditor.create(document.querySelector('#content')).catch(error => console.error(error));
    });
</script>
@endpush
