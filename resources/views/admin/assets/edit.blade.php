@extends('admin.portal')

@section('title', 'Edit Asset')
@section('header_title', 'Edit Asset')

@section('content')
<div class="max-w-3xl mx-auto px-4">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-900">{{ $asset->title }}</h1>
        <a href="{{ route('admin.assets.index') }}" class="text-gray-600 hover:text-gray-900">
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
        <form action="{{ route('admin.assets.update', $asset) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            @include('admin.assets._form', ['asset' => $asset])
        </form>
    </div>
</div>
@endsection
