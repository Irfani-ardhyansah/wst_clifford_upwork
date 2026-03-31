@extends('admin.portal')

@section('title', 'Edit Article')
@section('header_title', 'Edit Article')

@push('styles')
<style>
    /* wrapper editor */
    .ck-editor__main {
        background-color: var(--surface) !important;
    }

    /* area content */
    .ck-content {
        background-color: var(--surface) !important;
        color: var(--text-2) !important;
        font-family: inherit;
        line-height: 1.6;
    }

    .ck-content,
    .ck-content p,
    .ck-content span,
    .ck-content li,
    .ck-content h1,
    .ck-content h2,
    .ck-content h3,
    .ck-content h4,
    .ck-content h5,
    .ck-content h6 {
        color: var(--text-2) !important;
    }

    /* toolbar */
    .ck-toolbar {
        background-color: var(--surface-2) !important;
        border-color: var(--border) !important;
    }

    /* border editor */
    .ck.ck-editor__main > .ck-editor__editable {
        border-color: var(--border) !important;
    }

    /* placeholder */
    .ck-content.ck-placeholder::before {
        color: var(--text-3) !important;
    }
</style>
@endpush

@section('content')
<div class="max-w-3xl mx-auto px-4">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-[var(--text-1)]">Edit Article</h1>
        <a href="{{ route('admin.articles.index') }}" class="text-gray-600 hover:text-gray-900">&larr; Back</a>
    </div>

    <div class="bg-[var(--surface)] rounded-xl shadow border border-[var(--border)] p-6">
        @if ($errors->any())
            <div class="mb-6 rounded-xl border border-red-200 bg-red-50 p-4">
                <div class="flex items-start gap-3">
                    <i class="fa-solid fa-triangle-exclamation text-red-500 mt-0.5"></i>
                    <div>
                        <p class="font-semibold text-red-700 text-sm">Please fix the following errors:</p>
                        <ul class="mt-2 list-disc list-inside text-sm text-red-600 space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif

        <form action="{{ route('admin.articles.update', $article) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('admin.articles._form', ['article' => $article])
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

