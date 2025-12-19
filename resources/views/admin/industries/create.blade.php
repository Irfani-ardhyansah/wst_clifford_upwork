@extends('admin.portal')

@section('title', 'Create Industries')
@section('header_title', 'Create Industries')

@section('content')
<div class="max-w-3xl mx-auto px-4">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-900"></h1>
        <a href="{{ route('admin.industries.index') }}" class="text-gray-500 hover:text-gray-900 font-medium">
            &larr; Back
        </a>
    </div>

    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/40 border border-gray-100 p-6">
        <form action="{{ route('admin.industries.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('admin.industries._form', ['industry' => null])
        </form>
    </div>
</div>
@endsection