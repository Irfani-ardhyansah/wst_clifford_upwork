@extends('admin.portal')

@section('title', 'Create Asset')
@section('header_title', 'Create Asset')

@section('content')
<div class="max-w-3xl mx-auto px-4">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold"></h1>
        <a href="{{ route('admin.assets.index') }}" class="text-gray-600 hover:text-gray-900">
            &larr; Back
        </a>
    </div>

    <div class="bg-white rounded-xl shadow p-6">
        <form action="{{ route('admin.assets.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('admin.assets._form', ['asset' => null])
        </form>
    </div>
</div>
@endsection
