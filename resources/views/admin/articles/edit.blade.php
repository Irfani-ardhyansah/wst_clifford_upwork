@extends('admin.portal')

@section('title', 'Edit Article')
@section('header_title', 'Edit Article')

@section('content')
<div class="max-w-3xl mx-auto px-4">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Edit Article</h1>
        <a href="{{ route('admin.articles.index') }}" class="text-gray-600 hover:text-gray-900">&larr; Back</a>
    </div>

    <div class="bg-white rounded-xl shadow p-6">
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
