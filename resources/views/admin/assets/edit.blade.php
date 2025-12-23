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
        <form action="{{ route('admin.assets.update', $asset) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            @include('admin.assets._form', ['asset' => $asset])
        </form>
    </div>
</div>
@endsection
