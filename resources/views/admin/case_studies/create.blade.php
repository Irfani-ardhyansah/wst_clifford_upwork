@extends('admin.portal')

@section('title', 'Create Case Study')
@section('header_title', 'Create Case Study')

@section('content')
<div class="max-w-3xl mx-auto py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">New Case Study</h1>
        <a href="{{ route('admin.case-studies.index') }}" class="text-gray-600 hover:text-gray-900">
            &larr; Back
        </a>
    </div>

    <div class="bg-white rounded-xl shadow p-6">
        <form action="{{ route('admin.case-studies.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('admin.case_studies._form', ['caseStudy' => null])
        </form>
    </div>
</div>
@endsection
