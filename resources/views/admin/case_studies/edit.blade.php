@extends('admin.portal')

@section('title', 'Edit Case Study')
@section('header_title', 'Edit Case Study')

@section('content')
<div class="max-w-3xl mx-auto py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Edit Case Study: {{ $caseStudy->title }}</h1>
        <a href="{{ route('admin.case-studies.index') }}" class="text-gray-600 hover:text-gray-900">
            &larr; Back
        </a>
    </div>

    <div class="bg-white rounded-xl shadow p-6">
        <form action="{{ route('admin.case-studies.update', $caseStudy) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            @include('admin.case_studies._form', ['caseStudy' => $caseStudy])
        </form>
    </div>
</div>
@endsection
