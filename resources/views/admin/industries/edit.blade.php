@extends('admin.portal')

@section('title', 'Edit Industries')
@section('header_title', 'Edit Industries')

@section('content')
<div class="max-w-3xl mx-auto px-4">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-900">{{ $industry->title }}</h1>
        <a href="{{ route('admin.industries.index') }}" class="text-gray-500 hover:text-gray-900 font-medium">
            &larr; Back
        </a>
    </div>

    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/40 border border-gray-100 p-6">
        <form action="{{ route('admin.industries.update', $industry) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('admin.industries._form', ['industry' => $industry])
        </form>
    </div>
</div>
@endsection